<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\booking;

class calendarControl extends Controller
{
    public function showCalendar()
    {
        $events = array();
        $bookings = booking::all();
        

        foreach($bookings as $book){
            $events[]=[
                'title' =>$book->booked_type,
                'startDate' =>$book->start_datetime,
                'endDate' =>$book->end_datetime,
            ];
        }
        return view ("adminCalendar",['events'=> $events]);
        // return view("adminCalendar");
    }
}
