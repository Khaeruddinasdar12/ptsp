<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Krk extends Model
{
    use HasFactory;

    protected $fillable = ['perizinan_id', 'no_rekomendasi', 'gelar_awal', 'nama', 'gelar_akhir', 'nik', 'nohp', 'alamat', 'luas', 'nama_surat', 'nomor_surat', 'penggunaan', 'jenis', 'jml_lantai', 'jml_bangunan', 'kelurahan', 'jalan', 'ktp', 'pbb', 'surat_tanah', 'peta', 'gambar', 'berkas_pendukung' ];

    public function perizinan()
    {
        return $this->belongsTo(Perizinan::class);
    }

    public function klh()
    {
        return $this->belongsTo(Kelurahan::class, 'kelurahan');
    }

    public function reason()
    {
        return $this->hasOne(Krkreason::class, 'krk_id', 'id');
    }
}
