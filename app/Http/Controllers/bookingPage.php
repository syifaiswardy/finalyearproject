<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\booking;

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

    function add_data(){
        return view("bookForm");
    }

}
