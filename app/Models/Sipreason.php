<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sipreason extends Model
{
    use HasFactory;

    protected $fillable = ['sip_id', 'nama', 'tempat_lahir', 'tanggal_lahir', 'no_str', 'rekomendasi_op', 'awal_str', 'akhir_str', 'alamat', 'nama_praktek1', 'jalan1', 'kelurahan1', 'jadwal1', 'nama_praktek2', 'jalan2', 'jadwal2', 'kelurahan2', 'nama_praktek3', 'jalan3', 'kelurahan3', 'jadwal3', 'ktp', 'foto', 'str', 'rekomendasi_org', 'surat_keterangan', 'surat_persetujuan', 'berkas_pendukung',];

    public function sip()
    {
        return $this->belongsTo(Sip::class, 'sip_id');
    }
}
