<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homepageControl extends Controller
{
    function index(){
        return view ("homepage");
    }
}
