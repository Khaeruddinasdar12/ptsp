<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perizinan extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'no_tiket', 'jenis_izin', 'status', 'bidang_by', 'teknis_by', 'kadis_by', 'ket', 'sertifikat', 'no_surat', 'verif_by', 'created_at', 'updated_at'];
    
    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])
        // ->diffForHumans();
        ->translatedFormat('d F Y H:i');
    }
    
    public function getUpdatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['updated_at'])
        // ->diffForHumans();
        ->translatedFormat('d F Y');
    }

    public function sip()
    {
        return $this->hasOne(Sip::class);
    }

    public function sik()
    {
        return $this->hasOne(Sik::class);
    }

    public function pendidikan()
    {
        return $this->hasOne(Pendidikan::class);
    }

    public function krk()
    {
        return $this->hasOne(Krk::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
