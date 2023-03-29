<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\equipment;

class equipControl extends Controller
{
    public function showEquip(){
        $data = equipment::all();
        return view("adminEquipment",['equip'=>$data]);
    }
}
