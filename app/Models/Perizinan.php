<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perizinan extends Model
{
    use HasFactory;
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
