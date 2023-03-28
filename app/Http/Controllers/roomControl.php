<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\room;

class roomControl extends Controller
{
    function showRoom(){
        $data = room::all();
        return view("adminRoom",['room'=>$data]);
    }
}
