<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\booking;
use Illuminate\Support\Facades\Auth;

class profilePage extends Controller
{
    // function showProfile(){
    //     // $value = User::all();

    //     // return view("bookForm",compact('value','equip'));
    //     return view('viewProfile', [
    //         'user' => Auth::user() // get the authenticated user
    //     ]);    
    // }

    public function showBooking()
{
    // Retrieve the authenticated user
    $user = Auth::user();

    // Retrieve the bookings that belong to the authenticated user
    $bookings = Booking::where('user_id', $user->id)->get();

    // Check if any bookings were found
    if ($bookings->isEmpty()) {
        return view("viewProfile", ['list' => $bookings, 'user_name' => $user->name]);
    }

    // Pass the bookings to the view
    return view("viewProfile", ['list' => $bookings, 'user_name' => $user->name]);
}




}
