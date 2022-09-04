<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sikreason extends Model
{
    use HasFactory;
    protected $fillable = ['sik_id', 'nama', 'tempat_lahir', 'tanggal_lahir', 'no_str', 'awal_str', 'akhir_str', 'alamat', 'nama_praktek', 'jalan', 'kelurahan', 'ktp', 'foto', 'str', 'ijazah', 'rekomendasi_org', 'surat_keterangan', 'surat_keluasan', 'berkas_pendukung',];

    public function sik()
    {
        return $this->belongsTo(Sik::class, 'sik_id');
    }
}
