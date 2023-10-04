<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@email.com',
            'password' => bcrypt('password'),
            'usertype' => 1,
        ]);

        User::create([
            'name' => 'customer',
            'email' => 'customer@email.com',
            'password' => bcrypt('password'),
            'usertype' => 0,
        ]);
    }
}
