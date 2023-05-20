<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\booking;
use App\Models\room;
use App\Models\user;
use App\Models\equipment;
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
}
