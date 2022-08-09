<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class SubizinSeeder extends Seeder
{
    public function run()
    {
        DB::table('subizins')->insert([
            'nama' => 'Dokter Gigi',
            'jenis' => 'sip',
        ]);

        DB::table('subizins')->insert([
            'nama' => 'Perawat',
            'jenis' => 'sip',
        ]);

        DB::table('subizins')->insert([
            'nama' => 'Ahli Gizi',
            'jenis' => 'sik',
        ]);

        DB::table('subizins')->insert([
            'nama' => 'Okupasi',
            'jenis' => 'sik',
        ]);
    }
}
