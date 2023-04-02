<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\booking_type;

class bookingTypeControl extends Controller
{
    // function index3(){
    //     return view("adminBookingType");
    // }

    function show(){
        $data = booking_type::all();
        $data = booking_type::paginate(5);
        return view("adminBookingType",['list'=>$data]);
    }
}
