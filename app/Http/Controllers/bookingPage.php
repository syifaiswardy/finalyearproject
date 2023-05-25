<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\booking;
use App\Models\booking_type;
use App\Models\booking_package;
use App\Models\room;
use App\Models\equipment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;



class bookingPage extends Controller
{
    function index2(){
        $events = array();
        $bookings = booking::all();
        

        foreach($bookings as $book){
            $events[]=[
                'title' =>$book->booked_type,
                'startDate' =>$book->start_datetime,
                'endDate' =>$book->end_datetime,
            ];
        }
        return view ("booking",['events'=> $events]);
    }

    function show(){
        //$type = booking_type::all();
        //$package = booking_package::all();
        $value = room::all();
        $equip = DB::table('equipments')->get();

        return view("bookForm",compact('value','equip'));
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
        $store->user_id = auth()->user()->id;
        $store->booking_notes = $p->notes;
        $store->start_datetime = $p->startDateTime;
        $store->end_datetime = $p->endDateTime;
        $store->booked_room = $p->bookingRoom;
        $store->booked_type = $p->BookingType;
        $store->booking_package = $p->package;
        $store->rentEquip = implode(',', $p->input('equip', []));
        $store->save();
    
        // flash success message to session
        $p->session()->flash('success', 'Booking has been recorded successfully. Click Booking History to view your booking details and payment');
        return redirect('/bookform');
    }
    
    
}
