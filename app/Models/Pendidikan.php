<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;

    protected $fillable =['perizinan_id', 'subizin_id', 'no_rekomendasi', 'gelar_awal', 'nama', 'gelar_akhir', 'nohp', 'alamat', 'nama_yayasan', 'nama_pendidikan', 'no_npsn', 'kelurahan', 'jalan', 'kode_pos', 'jenis_program', 'surat_permohonan', 'ktp', 'pas_foto', 'imb', 'akta', 'kurikulum', 'struktur_organisasi', 'sk', 'sertifikat_tanah', 'nib', 'npsn', 'izin_lama', 'berkas_pendukung'];

    public function perizinan()
    {
        return $this->belongsTo(Perizinan::class);
    }

    public function subizin()
    {
        return $this->belongsTo(Subizin::class, 'subizin_id');
    }

    public function reason()
    {
        return $this->hasOne(Pddreason::class, 'pendidikan_id', 'id');
    }

    public function klh()
    {
        return $this->belongsTo(Kelurahan::class, 'kelurahan');
    }
}
