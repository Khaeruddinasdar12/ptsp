<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Krkreason extends Model
{
    use HasFactory;
    // protected $table = 'krkreasons';
    protected $fillable = ['krk_id', 'nama', 'nik', 'nohp', 'alamat', 'luas', 'nama_surat', 'nomor_surat', 'penggunaan', 'jenis', 'jml_lantai', 'jml_bangunan', 'kelurahan', 'jalan', 'ktp', 'pbb', 'surat_tanah', 'peta', 'gambar', 'berkas_pendukung'];

    public function krk()
    {
        return $this->belongsTo(Krk::class, 'krk_id');
    }
}
