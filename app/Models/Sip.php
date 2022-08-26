<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sip extends Model
{
    use HasFactory;

    protected $fillable = ['perizinan_id', 'nama', 'tempat_lahir', 'tanggal_lahir', 'no_str', 'awal_str', 'akhir_str', 'no_rekomendasi', 'alamat', 'subizin_id', 'nama_praktek1', 'jalan1', 'kelurahan1', 'nama_praktek2', 'jalan2', 'kelurahan2', 'nama_praktek3', 'jalan3', 'kelurahan3', 'ktp', 'foto', 'str', 'rekomendasi_org', 'surat_keterangan', 'surat_persetujuan', 'berkas_pendukung', 'created_at', 'updated_at'];

    public function perizinan()
    {
        return $this->belongsTo(Perizinan::class);
    }

    public function klh1()
    {
        return $this->belongsTo(Kelurahan::class, 'kelurahan1');
    }

    public function klh2()
    {
        return $this->belongsTo(Kelurahan::class, 'kelurahan2');
    }

    public function klh3()
    {
        return $this->belongsTo(Kelurahan::class, 'kelurahan3');
    }

    public function subizin()
    {
        return $this->belongsTo(Subizin::class, 'subizin_id');
    }

    public function reason()
    {
        return $this->hasOne(Sipreason::class, 'sip_id', 'id');
    }

    public function getAwalStrAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['awal_str'])
        // ->diffForHumans();
        ->translatedFormat('d F Y');
    }

    public function getAkhirStrAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['akhir_str'])
        // ->diffForHumans();
        ->translatedFormat('d F Y');
    }
}
