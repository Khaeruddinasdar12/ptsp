<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluhan extends Model
{
    use HasFactory;
    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])
        // ->diffForHumans();
        ->translatedFormat('d F Y H:i');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
