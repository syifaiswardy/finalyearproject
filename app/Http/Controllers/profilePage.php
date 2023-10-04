<?php

namespace App\Http\Controllers;
error_reporting(E_ALL);
ini_set('display_errors', 1);

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\booking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Storage;



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

    public function edit($id)
    {
        $bookings = Booking::find($id);

        return view("uploadFile",compact('bookings'));
    }

    public function uploadFile(Request $request,$id)
    {
        $booking = Booking::find($id);
        $booking->booking_notes = $request->notes;
        $booking->start_dateTime = $request->startDateTime;
        $booking->end_dateTime = $request->endDateTime;
        $booking->booked_room = $request->bookroom;
        $booking->booked_type = $request->booktype;
        $booking->booking_package = $request->bookpackage;
        
        if ($request->hasFile('file_path')) 
        {
            $destination = 'public/storage'.$booking->file_path;
            if(File::exists($destination))
            {
                File::delete($destination);
            }


        $size = $request->file('file_path')->getSize();
        $name = $request->file('file_path')->getClientOriginalName();

        $booking->file_path = $request->file_path -> storeAs('public/storage', $name);
        $booking->name_file= $name;
        $booking->size_file = $size;
        $booking->save();

        $filePath = asset('storage/' . $booking->file_path);
        $request->session()->flash('filePath', $filePath);
        
        return redirect()->back()->with('success', 'File uploaded successfully')->with('fileName', $name);

        }

    }

    function formatSizeUnits($bytes)
{
    $units = ['B', 'KB', 'MB', 'GB', 'TB'];
    $index = 0;

    while ($bytes >= 1024 && $index < 4) {
        $bytes /= 1024;
        $index++;
    }

    return round($bytes, 2) . ' ' . $units[$index];
}


}
