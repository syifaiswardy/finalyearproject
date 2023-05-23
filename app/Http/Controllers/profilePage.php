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
        $booking->start_datetime = $request->startDateTime;
        $booking->end_datetime = $request->endDateTime;
        $booking->booked_room = $request->bookroom;
        $booking->booked_type = $request->booktype;
        $booking->booked_type = $request->booktype;
        
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
        // Store the file name in a session
        // $request->session()->flash('uploadedFileName', $name);

        return redirect()->back()->with('success', 'File uploaded successfully')->with('fileName', $name);

        }

        

        // $booking->file_path = $request->file_path -> store('public/upload');

        // if ($request->hasFile('file_path')) 
        // {
        //     $destination = 'public/upload/'.$booking->file_path;
        //     if(File::exists($destination))
        //     {
        //         File::delete($destination);
        //     }

        //     $file = $request->file('file_path');

        //     // Check for file upload errors
        //     if ($file->isValid()) {
        //         $extension = $file->getClientOriginalExtension();
        //         $filename = time() . '.' . $extension;
        //         $file->move('public/upload/', $filename);
        //         $booking->file_path = $filename;

        //     } else {
        //         return redirect()->back()->with('error', 'Error uploading file: ', $file->getErrorMessage());
        //     }
        // }
        

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
