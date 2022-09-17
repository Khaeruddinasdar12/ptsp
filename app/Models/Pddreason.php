<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pddreason extends Model
{
    use HasFactory;
    protected $fillable = ['pendidikan_id', 'nama', 'alamat', 'nama_pendidikan', 'kelurahan', 'jalan', 'ktp', 'pas_foto', 'akta', 'kurikulum', 'struktur_organisasi', 'sk', 'sertifikat_tanah','nib', 'npsn', 'izin_lama', 'berkas_pendukung',];

    public function pdd()
    {
        return $this->belongsTo(Pendidikan::class, 'pendidikan_id');
    }
}
