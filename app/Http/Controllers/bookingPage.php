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
            $color = null;
            if ($book->booked_type == "Jamming")
            {
                $color = '#E75D5D';
            }
            else if($book->booked_type == "Recording")
            {
                $color = '#E79F5D';
            }
            else if ($book->booked_type == "Music Class")
            {
                $color = '#E7C15E';
            }
            else 
            {
                $color = '#FFFF';
            }
            $events[]=[
                'title' =>$book->booked_type,
                'start' =>$book->start_dateTime,
                'end' =>$book->end_dateTime,
                'color' => $color,
            ];
        }
        return view ("booking",compact("events"));
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
            'endDateTime' => 'required|date|after:startDateTime'. $p->startDateTime,
            // other validation rules here
        ]);
        $validator->after(function ($validator) use ($p) {
            if ($p->startDateTime > $p->endDateTime) {
                $validator->errors()->add('endDateTime', 'The end date must be greater than the start date.');
            }
        });
        // Check if the selected dates are not already booked
        $existingBookings = Booking::whereBetween('start_dateTime', [$p->startDateTime, $p->endDateTime])
            ->orWhereBetween('end_dateTime', [$p->startDateTime, $p->endDateTime])
            ->orWhere(function ($query) use ($p) {
                $query->where('start_dateTime', '<', $p->startDateTime)
                    ->where('end_dateTime', '>', $p->endDateTime);
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
        $store->start_dateTime = $p->startDateTime;
        $store->end_dateTime = $p->endDateTime;
        $store->booked_room = $p->bookingRoom;
        $store->booked_type = $p->BookingType;
        $store->booking_package = $p->package;
        $store->booking_fee = str_replace('RM', '', $p->bookingfee);
        $store->total_payment = str_replace('RM', '', $p->totalfee);
        $store->rentEquip = implode(',', $p->input('equip', []));
        $store->save();
    
        // flash success message to session
        $p->session()->flash('success', 'Booking has been recorded successfully. Click Booking History to view your booking details and payment');
        return redirect('/bookform');
    }
    
    
}
