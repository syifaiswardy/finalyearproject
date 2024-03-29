<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\room;
use Illuminate\Support\Facades\DB;

class roomControl extends Controller
{
    function showRoom(){
        $data = room::all();
        return view("adminRoom",['room'=>$data]);
    }

    public function showAddRoom()
    {
        $room = room::all();
        return view("adminAddRoom",compact('room'));
    }

    public function storeAddRoom(Request $p){
        
        $store = new room;
        $store->room_name = $p->room_name;

        $store->save();
    
        // flash success message to session
        // $p->session()->flash('success', "Booking has been recorded successfully. Click Back to view customer's booking details");
        return redirect('/room');
    }

    public function editRoom($id)
    {
        $room = room::find($id);

        return view("adminEditRoom", compact('room'));
    }

    public function updateRoom(Request $request)
    {
        $room = room::find($request->room_id);
        $room->room_name = $request->room_name;

        $room->save();
        return redirect("/room");
    }

    public function deleteRoom($id)
    {
        $room = room::find($id);

        return view("adminDeleteRooms", compact('room'));
    }

    public function destroyRoom($id)
    {
        try {
            DB::delete('delete from rooms where id = ?', [$id]);

            return redirect('/room')->with('success', 'Booking type deleted successfully.');
        } catch (\Exception $e) {
            return redirect('/room')->with('error', 'Failed to delete booking type.');
        }
    }


}
