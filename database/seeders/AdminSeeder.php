<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class AdminSeeder extends Seeder
{
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'Bidang',
            'email' => 'bidang@gmail.com',
            'password' => bcrypt(12345678),
            'role' => 'bidang',
            'nik' => '7308090408990001',
        ]);

        DB::table('admins')->insert([
            'name' => 'Teknis',
            'email' => 'teknis@gmail.com',
            'password' => bcrypt(12345678),
            'role' => 'teknis',
            'nik' => '7308090408990002',
        ]);

        DB::table('admins')->insert([
            'name' => 'Kadis',
            'email' => 'kadis@gmail.com',
            'password' => bcrypt(12345678),
            'role' => 'kadis',
            'nik' => '7308090408990003',
        ]);

        DB::table('admins')->insert([
            'name' => 'Superadmin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt(12345678),
            'role' => 'superadmin',
            'nik' => '7308090408990004',
        ]);
    }
}
