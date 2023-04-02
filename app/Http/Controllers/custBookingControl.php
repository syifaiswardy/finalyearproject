<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\booking;

class custBookingControl extends Controller
{
    public function showBook(){
        $data = booking::all();
        //return view("adminCustomerBooking");
        return view("adminCustomerBooking",['book'=>$data]);
    }
}
