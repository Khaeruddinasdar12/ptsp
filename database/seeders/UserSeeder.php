<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Khaeruddin Asdar',
            'email' => 'khaeruddinasdar12@gmail.com',
            'password' => bcrypt(12345678),
            'nik' => '7308090408990001',
            'nohp' => '082344949505',
        ]);
    }
}
