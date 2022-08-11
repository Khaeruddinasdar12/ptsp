<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sip extends Model
{
    use HasFactory;

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
