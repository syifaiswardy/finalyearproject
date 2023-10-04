<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\booking;
use App\Models\user;

class homepageControl extends Controller
{
    function index(){
        return view ("homepage");
    }

    public function redirectFunct()
    {
        $typeuser = Auth::user()->usertype;
        $username = Auth::user()->name;

        if ($typeuser == '1') {

            // Fetching data from the database
            $bookings = Booking::all();
            $users = User::where('usertype', 0)->get();
            
            // Counting total bookings for each user
            $rankings = User::withCount('bookings')
            ->where('usertype', 0)
            ->orderBy('bookings_count', 'desc')
            ->take(5)
            ->get();

            $nama = User::withCount('bookings')
            ->where('usertype', 0)
            ->orderBy('bookings_count', 'desc')
            ->get();
                
            // Counting totals
            $totalCustomers = count($users);
            $totalBookings = count($bookings);
            $totalJammingBookings = Booking::where('booked_type', 'Jamming')->count();
            $totalRecordingBookings = Booking::where('booked_type', 'Recording')->count();
            $totalMusicClassBookings = Booking::where('booked_type', 'Music Class')->count();

            return view("adminpage", compact('username','nama','rankings', 'bookings', 'totalCustomers', 'totalBookings', 'totalJammingBookings', 'totalRecordingBookings', 'totalMusicClassBookings'));
        } else {
            $booking = Booking::all();
            return view("homepage", compact($booking));
        }
    }

    public function showCalendar()
    {
        
        // return view("adminCalendar");
    }


}
