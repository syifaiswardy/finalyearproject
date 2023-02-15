<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class homepageControl extends Controller
{
    function index(){
        return view ("homepage");
    }

    function redirectFunct(){
        $typeuser=Auth::user()->usertype;

        if($typeuser=='1')
        {
            return view("adminpage");
        }
        else
        {
            return view ("homepage");
        }
    }
}
