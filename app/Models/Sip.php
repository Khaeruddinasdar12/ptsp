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
