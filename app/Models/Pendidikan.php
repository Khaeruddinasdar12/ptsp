<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;

    protected $fillable =['perizinan_id', 'subizin_id', 'no_rekomendasi', 'nama', 'nohp', 'alamat', 'nama_pendidikan', 'kelurahan', 'jalan', 'ktp', 'pas_foto', 'akta', 'kurikulum', 'struktur_organisasi', 'sk', 'sertifikat_tanah', 'nib', 'npsn', 'izin_lama', 'berkas_pendukung'];

    public function perizinan()
    {
        return $this->belongsTo(Perizinan::class);
    }

    public function subizin()
    {
        return $this->belongsTo(Subizin::class, 'subizin_id');
    }

    public function klh()
    {
        return $this->belongsTo(Kelurahan::class, 'kelurahan');
    }
}
