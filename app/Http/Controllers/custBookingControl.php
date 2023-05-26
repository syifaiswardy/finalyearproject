<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\booking;
use App\Models\room;
use App\Models\user;
use App\Models\equipment;
use App\Models\booking_type;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class custBookingControl extends Controller
{
    public function showBook(){
        $data = DB::table('bookings')
                    ->join('users', 'bookings.user_id', '=', 'users.id')
                    ->select('bookings.*', 'users.name as user_name')
                    ->get();
        return view("adminCustomerBooking", ['book'=>$data]);
    }
    

    public function showAddBook(){
        //$type = booking_type::all();
        //$package = booking_package::all();
        $user = user::all();
        $value = room::all();
        $equip = equipment::all();

        return view("adminAddCustBooking",compact('user','value','equip'));
        //return view ("bookForm",['list'=> $value]);
    }

    public function store(Request $p){
        $validator = Validator::make($p->all(), [
            'startDateTime' => 'required|date|after:now',
            'endDateTime' => 'required|date|after:startDateTime',
            // other validation rules here
        ]);
        // Check if the selected dates are not already booked
        $existingBookings = Booking::whereBetween('start_datetime', [$p->startDateTime, $p->endDateTime])
            ->orWhereBetween('end_datetime', [$p->startDateTime, $p->endDateTime])
            ->orWhere(function ($query) use ($p) {
                $query->where('start_datetime', '<', $p->startDateTime)
                    ->where('end_datetime', '>', $p->endDateTime);
            })
            ->count();

        if ($existingBookings > 0) {
        return back()->with('error', 'The selected dates are already booked. Please choose different dates.');
        }

        if ($validator->fails()) {
            // Store the error messages in the session
            $p->session()->flash('error', $validator->errors()->first());
            return redirect()->back()->withInput();
        }
    
        // If validation passes, create the booking record
        $store = new booking;
        $store->user_id = $p->customer;
        $store->booking_notes = $p->notes;
        $store->start_datetime = $p->startDateTime;
        $store->end_datetime = $p->endDateTime;
        $store->booked_room = $p->bookingRoom;
        $store->booked_type = $p->BookingType;
        $store->booking_package = $p->package;
        $store->rentEquip = implode(',', $p->input('equip', []));
        $store->save();
    
        // flash success message to session
        $p->session()->flash('success', "Booking has been recorded successfully. Click Back to view customer's booking details");
        return redirect('/addCustBook');
    }

    public function editCustBook($id)
    {
        $username = DB::table('bookings')
        ->join('users', 'bookings.user_id', '=', 'users.id')
        ->select('bookings.*', 'users.name as user_name')
        ->first();
        $room = room::all();
        $equip = DB::table('equipments')->get();
        $bookings = Booking::find($id);
        
        // $selectedEquip = $bookings->equipment()->pluck('equip_name')->toArray();
        return view("adminEditCustBook", compact('bookings','equip', 'room', 'username'));
    }

    public function updateCustBook(Request $p)
    {
        $update = Booking::find($p->booking_id);
        
        // Retrieve the user_id based on the selected user_name
        $user = User::where('name', $p->name)->first();
        $update->user_id = $user->id;

        $update->booking_notes = $p->notes;
        $update->start_datetime = $p->startDateTime;
        $update->end_datetime = $p->endDateTime;
        $update->booked_room = $p->bookingRoom;
        $update->booked_type = $p->BookingType;

        if ($p->BookingType == 'Recording') {
            // Set the booking_package value based on the selected package
            $update->booking_package = $p->package;
        } else {
            // Reset the booking_package value to "-"
            $update->booking_package = NULL;
        }

        $update->booking_package = $p->package;
        $update->rentEquip = implode(',', $p->input('equip', []));

        $update->save();
        return redirect("/custbook");
    }

    public function editBookType($id)
    {
        $booktype = Booking_type::find($id);

        return view("adminEditBookingTypes", compact('booktype'));
    }

    public function updateBookType(Request $request)
    {
        $update = Booking_type::find($request->booktype_id);

        $update->booking_name = $request->booktype_name;
        $update->booking_desc = $request->booktype_desc;
        // $update->recording_packages = $request->packages;
        // $update->recording_packagesDesc = $request->packages_desc;
        $update->booking_price = $request->price;

        if ($request->packages == 'NONE') {
            $update->recording_packages = NULL;
        } else {
            $update->recording_packages = $request->packages;
        }

        if ($request->packages_desc == 'NONE') {
            $update->recording_packagesDesc = NULL;
        } else {
            $update->recording_packagesDesc = $request->packages_desc;
        }

        $update->save();
        return redirect("/bookingtype");
    }

    public function showAddBookTypes()
    {
        $booktypes = Booking_type::all();

        return view("adminAddBookingTypes",compact('booktypes'));
    }

    public function storeAddBookTypes(Request $p){
        
        $store = new booking_type;
        $store->booking_name = $p->booktype_name;
        $store->booking_desc = $p->booktype_desc;
        $store->recording_packages = $p->packages;
        $store->recording_packagesDesc = $p->packages_desc;
        $store->booking_price = $p->price;

        $store->save();
    
        // flash success message to session
        // $p->session()->flash('success', "Booking has been recorded successfully. Click Back to view customer's booking details");
        return redirect('/bookingtype');
    }

}
