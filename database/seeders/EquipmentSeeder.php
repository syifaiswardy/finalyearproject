<?php

namespace Database\Seeders;

use App\Models\equipment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        equipment::create([
            'equip_name' => 'Fender Guitar',
            'rent_price' => 10,
        ]);
        equipment::create([
            'equip_name' => 'Fender Bass',
            'rent_price' => 5,
        ]);
    }
}
