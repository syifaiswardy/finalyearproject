<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\equipment;
use Illuminate\Support\Facades\DB;

class equipControl extends Controller
{
    public function showEquip(){
        $data = DB::table('equipments')->get();
        return view("adminEquipment",['equip'=>$data]);
    }
}
