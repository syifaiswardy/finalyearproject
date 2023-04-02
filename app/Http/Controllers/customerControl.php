<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class customerControl extends Controller
{
    public function showCust(){

        //$data = User::all();
        $data = DB::table('users')->where('usertype','=', 0)->get();
        return view("adminCustomer",['cust'=>$data]);
    }
    
}
