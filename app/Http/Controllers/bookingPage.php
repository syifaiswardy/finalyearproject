<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\booking;

class bookingPage extends Controller
{
    function index2(){
        $bookings = booking::all();
        $events = array();

        foreach($bookings as $book){
            $events[]=[
                'title' =>$book->booking_title,
                'start' =>$book->start_dateTime,
                'end' =>$book->end_dateTime,
            ];
        }
        return view ("booking",['events'=> $events]);
    }

    function add_data(){
        return view("bookForm");
    }

}
