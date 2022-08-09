<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subizin extends Model
{
    use HasFactory;

    public function sip()
    {
        return $this->hasMany(Sip::class, 'subizin_id', 'id');
    }

    public function sik()
    {
        return $this->hasOne(Sik::class, 'subizin_id', 'id');
    }

    public function krk()
    {
        return $this->hasOne(Krk::class, 'subizin_id', 'id');
    }

    public function pendidikan()
    {
        return $this->hasOne(Pendidikan::class, 'subizin_id', 'id');
    }
}
