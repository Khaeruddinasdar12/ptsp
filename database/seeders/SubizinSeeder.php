<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class SubizinSeeder extends Seeder
{
    public function run()
    {

        DB::table('subizins')->insert([
            'nama' => 'Dokter Umum',
            'jenis' => 'sip',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia Nomor 2052/MENKES/PER/X/2011 tentang Izin Pelaksanaan Praktik Kedokteran',
            'kode' => 'DU',
        ]);

        DB::table('subizins')->insert([ //1
            'nama' => 'Dokter Spesialis',
            'jenis' => 'sip',
            'kategori' => 'Dokter Spesialis Bedah Plastik',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia Nomor 2052/MENKES/PER/X/2011 tentang Izin Pelaksanaan Praktik Kedokteran',
            'kode' => 'DS',
        ]);

        DB::table('subizins')->insert([
            'nama' => 'Dokter Gigi',
            'jenis' => 'sip',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia Nomor 2052/MENKES/PER/X/2011 tentang Izin Pelaksanaan Praktik Kedokteran',
            'kode' => 'DG',
        ]);
        DB::table('subizins')->insert([
            'nama' => 'Dokter Gigi Spesialis',
            'jenis' => 'sip',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia Nomor 2052/MENKES/PER/X/2011 tentang Izin Pelaksanaan Praktik Kedokteran',
            'kode' => 'DGS',
        ]);
        DB::table('subizins')->insert([
            'nama' => 'Perawat',
            'jenis' => 'sip',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia Nomor 26 Tahun 2019 tentang Peraturan Pelaksanaan UU No. 38 Tahun 2018 tentang Keperawatan',
            'kode' => 'P',
        ]);
        DB::table('subizins')->insert([
            'nama' => 'Bidan',
            'jenis' => 'sip',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia Nomor 28 Tahun 2017 tentang Izin dan Penyelenggaraan Praktik Bidan',
            'kode' => 'B',
        ]);
        DB::table('subizins')->insert([
            'nama' => 'Apoteker',
            'jenis' => 'sip',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia Nomor 31 Tahun 2016 tentang Perubahan Atas Peraturan Menteri Kesehatan Nomor 889/MENKES/PER/V/2011 tentang Registrasi, Izin Praktik dan Izin Kerja Tenaga Kefarmasian',
            'kode' => 'A',
        ]);
        DB::table('subizins')->insert([
            'nama' => 'TTK - Tenaga Teknis Kefarmasian',
            'jenis' => 'sip',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia Nomor 31 Tahun 2016 tentang Perubahan Atas Peraturan Menteri Kesehatan Nomor 889/MENKES/PER/V/2011 tentang Registrasi, Izin Praktik dan Izin Kerja Tenaga Kefarmasian',
            'kode' => 'TTK',
        ]);
        DB::table('subizins')->insert([
            'nama' => 'Psikolog Klinis',
            'jenis' => 'sip',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia  Nomor 45 Tahun 2017 tentang Izin Penyelenggaraan dan Praktik Psikolog Klinis',
            'kode' => 'PK',
        ]);
        DB::table('subizins')->insert([
            'nama' => 'Fisioterapi',
            'jenis' => 'sip',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia  Nomor 80 Tahun 2013 tentang Penyelenggaraan Pekerjaan dan Praktik Fisioterapis',
            'kode' => 'F',
        ]);
        DB::table('subizins')->insert([
            'nama' => 'ATLM',
            'jenis' => 'sip',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia  Nomor 42 Tahun 2015 tentang Izin Penyelenggaraan Praktik Ahli Teknologi Laboratorium Medik',
            'kode' => 'ATLM',
        ]);
        DB::table('subizins')->insert([
            'nama' => 'Penata Anastesi',
            'jenis' => 'sip',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia  Nomor 18 Tahun 2016 tentang Izin Penyelenggaraan Praktik Penata Anastesi',
            'kode' => 'PA',
        ]);
        DB::table('subizins')->insert([
            'nama' => 'Terapis Gigi dan Mulut',
            'jenis' => 'sip',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia  Nomor 20 Tahun 2016 tentang Izin Penyelenggaraan dan Praktik Terapis Gigi dan Mulut',
            'kode' => 'TGM',
        ]);
        DB::table('subizins')->insert([
            'nama' => 'Ortotis Prostetik',
            'jenis' => 'sip',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia  Nomor 22 Tahun 2013 tentang Izin Penyelenggaraan dan Praktik Ortotis Prostetik',
            'kode' => 'OP',
        ]);
        DB::table('subizins')->insert([
            'nama' => 'Teknisi Kardiovaskuler',
            'jenis' => 'sip',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia  Nomor 30 Tahun 2015 tentang Izin Penyelenggaraan dan Praktik Teknisi Kardiovaskuler',
            'kode' => 'TK',
        ]);
        DB::table('subizins')->insert([
            'nama' => 'Terapis Wicara',
            'jenis' => 'sip',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia  Nomor 24 Tahun 2013 tentang Izin Penyelenggaraan dan Praktik Terapis Wicara',
            'kode' => 'TW',
        ]);
        DB::table('subizins')->insert([
            'nama' => 'Elektromedis',
            'jenis' => 'sip',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia  Nomor 45 Tahun 2015 tentang Izin Penyelenggaraan dan Praktik Elektromedis',
            'kode' => 'E',
        ]);
        DB::table('subizins')->insert([
            'nama' => 'Pengobat Tradisional Empiris',
            'jenis' => 'sip',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia  Nomor 61 Tahun 2013 tentang Izin Pelayanan Kesehatan Tradisonal Empiris',
            'kode' => 'KT',
        ]);
        
        DB::table('subizins')->insert([ //2
            'nama' => 'Dokter Spesialis',
            'jenis' => 'sip',
            'kategori' => 'Dokter Spesialis Kedokteran Fisik dan Rehabibilitasi',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia Nomor 2052/MENKES/PER/X/2011 tentang Izin Pelaksanaan Praktik Kedokteran',
            'kode' => 'DS',
        ]);
        DB::table('subizins')->insert([ //3
            'nama' => 'Dokter Spesialis',
            'jenis' => 'sip',
            'kategori' => 'Dokter Spesialis PPDS Sub Spesialis Kardiolagi Intervensi',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia Nomor 2052/MENKES/PER/X/2011 tentang Izin Pelaksanaan Praktik Kedokteran',
            'kode' => 'DS',
        ]);
        DB::table('subizins')->insert([ //4
            'nama' => 'Dokter Spesialis',
            'jenis' => 'sip',
            'kategori' => 'Dokter Spesialis Kedokteran Jiwa',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia Nomor 2052/MENKES/PER/X/2011 tentang Izin Pelaksanaan Praktik Kedokteran',
            'kode' => 'DS',
        ]);
        DB::table('subizins')->insert([ //5
            'nama' => 'Dokter Spesialis',
            'jenis' => 'sip',
            'kategori' => 'Dokter Spesialis Bedah Onkologi',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia Nomor 2052/MENKES/PER/X/2011 tentang Izin Pelaksanaan Praktik Kedokteran',
            'kode' => 'DS',
        ]);
        DB::table('subizins')->insert([ //6
            'nama' => 'Dokter Spesialis',
            'jenis' => 'sip',
            'kategori' => 'Dokter Spesialis Radiologi Subspesial Radiologi Muskuloskeletal',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia Nomor 2052/MENKES/PER/X/2011 tentang Izin Pelaksanaan Praktik Kedokteran',
            'kode' => 'DS',
        ]);
        DB::table('subizins')->insert([ //7
            'nama' => 'Dokter Spesialis',
            'jenis' => 'sip',
            'kategori' => 'Dokter Spesialis Penyakit Jantung dan Pembuluh Darah',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia Nomor 2052/MENKES/PER/X/2011 tentang Izin Pelaksanaan Praktik Kedokteran',
            'kode' => 'DS',
        ]);
        DB::table('subizins')->insert([ //8
            'nama' => 'Dokter Spesialis',
            'jenis' => 'sip',
            'kategori' => 'Dokter Spesialis Patologi Anatomi',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia Nomor 2052/MENKES/PER/X/2011 tentang Izin Pelaksanaan Praktik Kedokteran',
            'kode' => 'DS',
        ]);
        DB::table('subizins')->insert([ //9
            'nama' => 'Dokter Spesialis',
            'jenis' => 'sip',
            'kategori' => 'Dokter Spesialis Bedah',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia Nomor 2052/MENKES/PER/X/2011 tentang Izin Pelaksanaan Praktik Kedokteran',
            'kode' => 'DS',
        ]);
        DB::table('subizins')->insert([ //10
            'nama' => 'Dokter Spesialis',
            'jenis' => 'sip',
            'kategori' => 'Dokter Spesialis Urologi',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia Nomor 2052/MENKES/PER/X/2011 tentang Izin Pelaksanaan Praktik Kedokteran',
            'kode' => 'DS',
        ]);
        DB::table('subizins')->insert([ //11
            'nama' => 'Dokter Spesialis',
            'jenis' => 'sip',
            'kategori' => 'Dokter Spesialis Bedah/ PPDS Sub Spesialis Bedah Onkologi',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia Nomor 2052/MENKES/PER/X/2011 tentang Izin Pelaksanaan Praktik Kedokteran',
            'kode' => 'DS',
        ]);
        DB::table('subizins')->insert([ //12
            'nama' => 'Dokter Spesialis',
            'jenis' => 'sip',
            'kategori' => 'Dokter Spesialis Obstetri dan Ginekologi',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia Nomor 2052/MENKES/PER/X/2011 tentang Izin Pelaksanaan Praktik Kedokteran',
            'kode' => 'DS',
        ]);
        DB::table('subizins')->insert([ //13
            'nama' => 'Dokter Spesialis',
            'jenis' => 'sip',
            'kategori' => 'Dokter Spesialis Paru',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia Nomor 2052/MENKES/PER/X/2011 tentang Izin Pelaksanaan Praktik Kedokteran',
            'kode' => 'DS',
        ]);
        DB::table('subizins')->insert([ //14
            'nama' => 'Dokter Spesialis',
            'jenis' => 'sip',
            'kategori' => 'Dokter Spesialis Penyakit Jantung dan Pembuluh Darah',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia Nomor 2052/MENKES/PER/X/2011 tentang Izin Pelaksanaan Praktik Kedokteran',
            'kode' => 'DS',
        ]);
        DB::table('subizins')->insert([ //15
            'nama' => 'Dokter Spesialis',
            'jenis' => 'sip',
            'kategori' => 'Dokter Spesialis Penyakit Dalam Konsultan Reumatologi',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia Nomor 2052/MENKES/PER/X/2011 tentang Izin Pelaksanaan Praktik Kedokteran',
            'kode' => 'DS',
        ]);
        DB::table('subizins')->insert([ //16
            'nama' => 'Dokter Spesialis',
            'jenis' => 'sip',
            'kategori' => 'Dokter Spesialis Dermatologi dan Venereologi',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia Nomor 2052/MENKES/PER/X/2011 tentang Izin Pelaksanaan Praktik Kedokteran',
            'kode' => 'DS',
        ]);
        DB::table('subizins')->insert([ //17
            'nama' => 'Dokter Spesialis',
            'jenis' => 'sip',
            'kategori' => 'Dokter Spesialis Bedah Saraf',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia Nomor 2052/MENKES/PER/X/2011 tentang Izin Pelaksanaan Praktik Kedokteran',
            'kode' => 'DS',
        ]);
        DB::table('subizins')->insert([ //18
            'nama' => 'Dokter Spesialis',
            'jenis' => 'sip',
            'kategori' => 'Dokter Spesialis Bedah Saraf Subspesialis Bedah Saraf Onkologi',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia Nomor 2052/MENKES/PER/X/2011 tentang Izin Pelaksanaan Praktik Kedokteran',
            'kode' => 'DS',
        ]);
        DB::table('subizins')->insert([ //19
            'nama' => 'Dokter Spesialis',
            'jenis' => 'sip',
            'kategori' => 'Dokter Spesialis Mata',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia Nomor 2052/MENKES/PER/X/2011 tentang Izin Pelaksanaan Praktik Kedokteran',
            'kode' => 'DS',
        ]);
        DB::table('subizins')->insert([ //20
            'nama' => 'Dokter Spesialis',
            'jenis' => 'sip',
            'kategori' => 'Dokter Spesialis Neurologi',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia Nomor 2052/MENKES/PER/X/2011 tentang Izin Pelaksanaan Praktik Kedokteran',
            'kode' => 'DS',
        ]);
        DB::table('subizins')->insert([ //21
            'nama' => 'Dokter Spesialis',
            'jenis' => 'sip',
            'kategori' => 'Dokter Spesialis Anak',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia Nomor 2052/MENKES/PER/X/2011 tentang Izin Pelaksanaan Praktik Kedokteran',
            'kode' => 'DS',
        ]);
        DB::table('subizins')->insert([ //22
            'nama' => 'Dokter Spesialis',
            'jenis' => 'sip',
            'kategori' => 'Dokter Spesialis Orthopaedi dan Traumatologi',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia Nomor 2052/MENKES/PER/X/2011 tentang Izin Pelaksanaan Praktik Kedokteran',
            'kode' => 'DS',
        ]);
        DB::table('subizins')->insert([ //23
            'nama' => 'Dokter Spesialis',
            'jenis' => 'sip',
            'kategori' => 'Dokter Spesialis Anestesiologi',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia Nomor 2052/MENKES/PER/X/2011 tentang Izin Pelaksanaan Praktik Kedokteran',
            'kode' => 'DS',
        ]);
        DB::table('subizins')->insert([ //24
            'nama' => 'Dokter Spesialis',
            'jenis' => 'sip',
            'kategori' => 'Dokter Spesialis Patologi Klinik Subspesialis Hepatogastroenterologi',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia Nomor 2052/MENKES/PER/X/2011 tentang Izin Pelaksanaan Praktik Kedokteran',
            'kode' => 'DS',
        ]);
        DB::table('subizins')->insert([ //25
            'nama' => 'Dokter Spesialis',
            'jenis' => 'sip',
            'kategori' => 'Dokter Spesialis Ortodonsia',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia Nomor 2052/MENKES/PER/X/2011 tentang Izin Pelaksanaan Praktik Kedokteran',
            'kode' => 'DS',
        ]);
        DB::table('subizins')->insert([ //26
            'nama' => 'Dokter Spesialis',
            'jenis' => 'sip',
            'kategori' => 'Dokter Spesialis Gizi Klinik',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia Nomor 2052/MENKES/PER/X/2011 tentang Izin Pelaksanaan Praktik Kedokteran',
            'kode' => 'DS',
        ]);
        DB::table('subizins')->insert([ //27
            'nama' => 'Dokter Spesialis',
            'jenis' => 'sip',
            'kategori' => 'Dokter Spesialis Jantung Dan Pembuluh Darah',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia Nomor 2052/MENKES/PER/X/2011 tentang Izin Pelaksanaan Praktik Kedokteran',
            'kode' => 'DS',
        ]);
        DB::table('subizins')->insert([ //28
            'nama' => 'Dokter Spesialis',
            'jenis' => 'sip',
            'kategori' => 'Dokter Spesialis Radiologi',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia Nomor 2052/MENKES/PER/X/2011 tentang Izin Pelaksanaan Praktik Kedokteran',
            'kode' => 'DS',
        ]);
        DB::table('subizins')->insert([ //29
            'nama' => 'Dokter Spesialis',
            'jenis' => 'sip',
            'kategori' => 'Dokter Spesialis Periodonsia',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia Nomor 2052/MENKES/PER/X/2011 tentang Izin Pelaksanaan Praktik Kedokteran',
            'kode' => 'DS',
        ]);
        DB::table('subizins')->insert([ //30
            'nama' => 'Dokter Spesialis',
            'jenis' => 'sip',
            'kategori' => 'Dokter Spesialis Telinga Hidung Tenggorok - Bedah Kepala dan Leher',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia Nomor 2052/MENKES/PER/X/2011 tentang Izin Pelaksanaan Praktik Kedokteran',
            'kode' => 'DS',
        ]);
        DB::table('subizins')->insert([ //31
            'nama' => 'Dokter Spesialis',
            'jenis' => 'sip',
            'kategori' => 'Dokter Spesialis Bedah - Bedah Vaskuler dan Endovaskular',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia Nomor 2052/MENKES/PER/X/2011 tentang Izin Pelaksanaan Praktik Kedokteran',
            'kode' => 'DS',
        ]);
        DB::table('subizins')->insert([ //32
            'nama' => 'Dokter Spesialis',
            'jenis' => 'sip',
            'kategori' => 'Dokter Spesialis Paru Konsultan Infeksi Paru',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia Nomor 2052/MENKES/PER/X/2011 tentang Izin Pelaksanaan Praktik Kedokteran',
            'kode' => 'DS',
        ]);
        DB::table('subizins')->insert([ //33
            'nama' => 'Dokter Spesialis',
            'jenis' => 'sip',
            'kategori' => 'Dokter Spesialis Bedah Digesif',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia Nomor 2052/MENKES/PER/X/2011 tentang Izin Pelaksanaan Praktik Kedokteran',
            'kode' => 'DS',
        ]);





        // SIK
        DB::table('subizins')->insert([
            'nama' => 'Ahli Gizi',
            'jenis' => 'sik',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia  Nomor 26 Tahun 2013 tentang Izin Penyelenggaraan dan Praktik Tenaga Gizi',
            'kode' => 'AG',
        ]);
        DB::table('subizins')->insert([
            'nama' => 'Okupasi Terapis',
            'jenis' => 'sik',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia  Nomor 23 Tahun 2013 tentang Izin Penyelenggaraan dan Praktik Okupasi Terapis',
            'kode' => 'OT',
        ]);
        DB::table('subizins')->insert([
            'nama' => 'Refraksionis Optisien',
            'jenis' => 'sik',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia  Nomor 19 Tahun 2013 tentang Izin Penyelenggaraan Pekerjaan Refraksionis Optisien dan Optometris',
            'kode' => 'RO',
        ]);
        DB::table('subizins')->insert([
            'nama' => 'Tenaga Sanitarian',
            'jenis' => 'sik',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia  Nomor 32 Tahun 2013 tentang Izin Penyelenggaraan dan Praktik Tenaga Sanitarian',
            'kode' => 'TS',
        ]);
        DB::table('subizins')->insert([
            'nama' => 'Teknisi Gigi',
            'jenis' => 'sik',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia  Nomor 54 Tahun 2012 tentang Izin Penyelenggaraan dan Praktik Teknisi Gigi',
            'kode' => 'TG',
        ]);
        DB::table('subizins')->insert([
            'nama' => 'Perekam Medis',
            'jenis' => 'sik',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia  Nomor 55 Tahun 2013 tentang Izin Penyelenggaraan dan Praktik Perekam Medik',
            'kode' => 'PM',
        ]);
        DB::table('subizins')->insert([
            'nama' => 'Radiografer',
            'jenis' => 'sik',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia  Nomor 81 Tahun 2013 tentang Izin Penyelenggaraan dan Praktik Radiografer',
            'kode' => 'R',
        ]);
        DB::table('subizins')->insert([
            'nama' => 'Optometris',
            'jenis' => 'sik',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia  Nomor 19 Tahun 2013 tentang Izin Penyelenggaraan Pekerjaan Refraksionis Optisien dan Optometris',
            'kode' => 'OM',
        ]);
        DB::table('subizins')->insert([
            'nama' => 'Fisikiawan Medik',
            'jenis' => 'sik',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia  Nomor 12 Tahun 2008 tentang Izin Penyelenggaraan dan Praktik Fisikiawan Medik',
            'kode' => 'FM',
        ]);


        // PENDIDIKAN
        DB::table('subizins')->insert([
            'nama' => 'Program Pendidikan Dasar',
            'jenis' => 'pendidikan',
            'kategori' => 'SD',
            'dasar_hukum' => 'Peraturan Menteri Pendidikan dan Kebudayaan Nomor 36 Tahun 2014 tentang Pedoman Pendirian, Perubahan, dan Penutupan Satuan Pendidikan Dasar dan Menengah',
            'kode' => 'DIKDAS',
        ]);

        DB::table('subizins')->insert([
            'nama' => 'Program Pendidikan Dasar',
            'jenis' => 'pendidikan',
            'kategori' => 'SMP',
            'dasar_hukum' => 'Peraturan Menteri Pendidikan dan Kebudayaan Nomor 36 Tahun 2014 tentang Pedoman Pendirian, Perubahan, dan Penutupan Satuan Pendidikan Dasar dan Menengah',
            'kode' => 'DIKDAS',
        ]);

        DB::table('subizins')->insert([
            'nama' => 'PAUD',
            'jenis' => 'pendidikan',
            'kategori' => 'Taman Kanak-Kanak (TK)',
            'dasar_hukum' => 'Peraturan Menteri Pendidikan dan Kebudayaan Nomor 84 Tahun 2014
            tentang Pendirian Satuan Pendidikan Anak Usia Dini',
            'kode' => 'PAUD-TK',
        ]);

        DB::table('subizins')->insert([
            'nama' => 'PAUD',
            'jenis' => 'pendidikan',
            'kategori' => 'Kelompok Belajar (KB)',
            'dasar_hukum' => 'Peraturan Menteri Pendidikan dan Kebudayaan Nomor 36 Tahun 2014 tentang Pedoman Pendirian, Perubahan, dan Penutupan Satuan Pendidikan Dasar dan Menengah',
            'kode' => 'PAUD-KB',
        ]);

        DB::table('subizins')->insert([
            'nama' => 'PAUD',
            'jenis' => 'pendidikan',
            'kategori' => 'Tempat Pendidikan Anak (TPA)',
            'dasar_hukum' => 'Peraturan Menteri Pendidikan dan Kebudayaan Nomor 36 Tahun 2014 tentang Pedoman Pendirian, Perubahan, dan Penutupan Satuan Pendidikan Dasar dan Menengah',
            'kode' => 'PAUD-TPA',
        ]);

        DB::table('subizins')->insert([
            'nama' => 'Program Kegiatan Belajar Masyarakat',
            'jenis' => 'pendidikan',
            'dasar_hukum' => 'Peraturan Menteri Pendidikan dan Kebudayaan Nomor 81 Tahun 2013
            tentang Pendirian Satuan Pendidikan Nonforma',
            'kode' => 'PKBM',
        ]);

        DB::table('subizins')->insert([
            'nama' => 'Program Pendidikan Kursus Dan Pelatihan',
            'jenis' => 'pendidikan',
            'dasar_hukum' => 'Peraturan Menteri Pendidikan dan Kebudayaan Nomor 81 Tahun 2013
            tentang Pendirian Satuan Pendidikan Nonforma',
            'kode' => 'LKP',
        ]);



        DB::table('subizins')->insert([
            'nama' => 'Dokter PPDS',
            'jenis' => 'sip',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia Nomor 2052/MENKES/PER/X/2011 tentang Izin Pelaksanaan Praktik Kedokteran',
            'kode' => 'DS',
        ]);
        DB::table('subizins')->insert([
            'nama' => 'Dokter PPDS Sub Spesialis',
            'jenis' => 'sip',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia Nomor 2052/MENKES/PER/X/2011 tentang Izin Pelaksanaan Praktik Kedokteran',
            'kode' => 'DS',
        ]);
        DB::table('subizins')->insert([
            'nama' => 'Dokter PPDGS',
            'jenis' => 'sip',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia Nomor 2052/MENKES/PER/X/2011 tentang Izin Pelaksanaan Praktik Kedokteran',
            'kode' => 'DGS',
        ]);
        DB::table('subizins')->insert([
            'nama' => 'Dokter PPDGS Sub Spesialis',
            'jenis' => 'sip',
            'dasar_hukum' => 'Peraturan Menteri Kesehatan Republik Indonesia Nomor 2052/MENKES/PER/X/2011 tentang Izin Pelaksanaan Praktik Kedokteran',
            'kode' => 'DGS',
        ]);












    }
}
