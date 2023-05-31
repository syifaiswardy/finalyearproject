<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\booking_type;
use Illuminate\Support\Facades\DB;

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

    public function editBookType($id)
    {
        $booktype = Booking_type::find($id);

        return view("adminEditBookingTypes", compact('booktype'));
    }

    public function updateBookType(Request $request)
    {
        $update = Booking_type::find($request->booktype_id);

        $update->booking_name = $request->booktype_name;
        $update->booking_desc = $request->booktype_desc;
        // $update->recording_packages = $request->packages;
        // $update->recording_packagesDesc = $request->packages_desc;
        $update->booking_price = $request->price;

        if ($request->packages == 'NONE') {
            $update->recording_packages = NULL;
        } else {
            $update->recording_packages = $request->packages;
        }

        if ($request->packages_desc == 'NONE') {
            $update->recording_packagesDesc = NULL;
        } else {
            $update->recording_packagesDesc = $request->packages_desc;
        }

        $update->save();
        return redirect("/bookingtype");
    }

    public function showAddBookTypes()
    {
        $booktypes = Booking_type::all();

        return view("adminAddBookingTypes",compact('booktypes'));
    }

    public function storeAddBookTypes(Request $p){
        
        try{
        $store = new booking_type;
        $store->booking_name = $p->booktype_name;
        $store->booking_desc = $p->booktype_desc;
        $store->recording_packages = $p->packages;
        $store->recording_packagesDesc = $p->packages_desc;
        $store->booking_price = $p->price;

        $store->save();
    
        // flash success message to session
        // $p->session()->flash('success', "Booking has been recorded successfully. Click Back to view customer's booking details");
        return redirect('/bookingtype')->with('success', 'Booking type updated successfully.');
        
        }catch (\Exception $e) {
            return redirect('/bookingtype')->with('error', 'Failed to update booking type.');
        }

    }

    public function deleteBookTypes($id)
    {
        $booktype = Booking_type::find($id);

        return view("adminDeleteBookingTypes", compact('booktype'));
    }

    public function destroyBookTypes($id)
    {
        try {
            DB::delete('delete from booking_types where id = ?', [$id]);

            return redirect('/bookingtype')->with('success', 'Booking type deleted successfully.');
        } catch (\Exception $e) {
            return redirect('/bookingtype')->with('error', 'Failed to delete booking type.');
        }
    }



}
