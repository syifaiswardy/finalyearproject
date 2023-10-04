<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\booking_type;

class BookingTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        booking_type::create([
            'booking_name' => 'Jamming',
            'booking_desc' => 'Jam here with your friends, family or bandmates!',
            'booking_price' => 35,
        ]);

        booking_type::create([
            'booking_name' => 'Recording',
            'booking_desc' => 'Record your songs or voiceover here!',
            'booking_package' => 'Full Package',
            'booking_packageDesc' =>'Lyrics, arrangements, mixing and mastering are provided',
            'booking_price' => 5000,
        ]);

        booking_type::create([
            'booking_name' => 'Recording',
            'booking_desc' => 'Record your songs or voiceover here!',
            'booking_package' => 'Half Package',
            'booking_packageDesc' =>'Only arrangements, mixing and mastering are provided',
            'booking_price' => 3500,
        ]);

        booking_type::create([
            'booking_name' => 'Recording',
            'booking_desc' => 'Record your songs or voiceover here!',
            'booking_package' => 'Vocal or Voiceover only',
            'booking_packageDesc' =>'Record vocal for singers or any voiceover',
            'booking_price' => 50,
        ]);

        booking_type::create([
            'booking_name' => 'Music Class',
            'booking_desc' => 'Register here for music classes!',
            'booking_price' => 50,
        ]);
    }
}
