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
        return view ("adminCalendar",compact('events'));
        // return view("adminCalendar");
    }
}
