<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sik extends Model
{
    use HasFactory;

    protected $fillable = ['perizinan_id', 'nama', 'tempat_lahir', 'tanggal_lahir', 'nohp','no_str', 'awal_str', 'akhir_str', 'no_rekomendasi', 'rekomendasi_op', 'alamat', 'subizin_id', 'nama_praktek', 'jalan', 'kelurahan', 'ktp', 'foto', 'str', 'ijazah','rekomendasi_org', 'surat_keterangan', 'surat_keluasan', 'berkas_pendukung', 'created_at', 'updated_at'];

    public function perizinan()
    {
        return $this->belongsTo(Perizinan::class);
    }

    public function klh()
    {
        return $this->belongsTo(Kelurahan::class, 'kelurahan');
    }

    public function subizin()
    {
        return $this->belongsTo(Subizin::class, 'subizin_id');
    }

    public function reason()
    {
        return $this->hasOne(Sikreason::class, 'sik_id', 'id');
    }
    
    // public function getAwalStrAttribute()
    // {
    //     return \Carbon\Carbon::parse($this->attributes['awal_str'])
    //     // ->diffForHumans();
    //     ->translatedFormat('d F Y');
    // }

    // public function getAkhirStrAttribute()
    // {
    //     return \Carbon\Carbon::parse($this->attributes['akhir_str'])
    //     // ->diffForHumans();
    //     ->translatedFormat('d F Y');
    // }
}
