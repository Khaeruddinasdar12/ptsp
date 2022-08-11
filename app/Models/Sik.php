<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sik extends Model
{
    use HasFactory;

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
