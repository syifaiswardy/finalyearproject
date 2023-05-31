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

    public function showAddEquip()
    {
        $equip = DB::table('equipments')->get();
        return view("adminAddEquipment",compact('equip'));
    }

    public function storeAddEquip(Request $p){
        $equip_name = $p->equip_name;
        $rent_price = $p->price;
    
        DB::table('equipments')->insert([
            'equip_name' => $equip_name,
            'rent_price' => $rent_price,
        ]);
    
        return redirect('/equipment');
    }

    public function editEquip($id)
    {
        $equip = DB::table('equipments')->where('id', $id)->first();

        return view("adminEditEquipment", compact('equip'));
    }

    public function updateEquip(Request $request)
    {
        $equip_name = $request->equip_name;
        $rent_price = $request->equip_price;

        DB::table('equipments')->where('id', $request->equip_id)->update([
            'equip_name' => $equip_name,
            'rent_price' => $rent_price,
        ]);

        return redirect('/equipment');
    }

    public function deleteEquip($id){

        $equip = DB::table('equipments')->where('id', $id)->first();

        return view("adminDeleteEquipments", compact('equip'));
    
    }

    public function destroyEquip($id)
    {
        try {
            DB::delete('delete from equipments where id = ?', [$id]);

            return redirect('/equipment')->with('success', 'Booking type deleted successfully.');
        } catch (\Exception $e) {
            return redirect('/equipment')->with('error', 'Failed to delete booking type.');
        }
    }

}
