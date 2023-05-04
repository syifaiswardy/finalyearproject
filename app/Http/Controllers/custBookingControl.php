<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\booking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class custBookingControl extends Controller
{
    public function showBook(){
        $data = DB::table('bookings')
                    ->join('users', 'bookings.user_id', '=', 'users.id')
                    ->select('bookings.*', 'users.name as user_name')
                    ->get();
        return view("adminCustomerBooking", ['book'=>$data]);
    }
    
    
}
