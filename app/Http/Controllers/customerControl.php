<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class customerControl extends Controller
{
    public function showCust(){

        $data = User::all();
        // $data = DB::table('users')->where('usertype','=', 0)->get();
        return view("adminCustomer",['cust'=>$data]);
    }

    public function editUser($id){

        $data = User::find($id);
        return view("admineditUser",['cust'=>$data]);
    }

    public function updateUser(Request $p){

        $user = User::find($p->user_id);

        $user->name = $p->name;
        $user->email = $p->email;

        if ($p->usertype == '1') {
            // Set the booking_package value based on the selected package
            $user->usertype = '1';
        } else if ($p->usertype == '0'){
            // Reset the booking_package value to "-"
            $user->usertype = '0';
        }
        else{
            $user->usertype = '0';
        }

        $user->save();
        return redirect("/user");
    }
    
}
