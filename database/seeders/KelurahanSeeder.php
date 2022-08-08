<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use File;
class KelurahanSeeder extends Seeder
{
    public function run()
    {
    	$kelurahan = File::get(storage_path('\datakelurahanmks.json'));
        foreach($kelurahan as $Kelurahans) {
        	$data[] = [
        		'id' => $kelurahans['id'],
        		'kecamatan' => $kelurahans['kecamatan'],
        		'kelurahan' => $kelurahans['kelurahan']
        	];
        }
        Kelurahan::insert($data);
    }
}
