<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sipreason extends Model
{
    use HasFactory;

    public function sip()
    {
        return $this->belongsTo(Sip::class, 'sip_id');
    }
}
