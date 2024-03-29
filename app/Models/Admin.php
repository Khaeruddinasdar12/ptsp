<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticable
{
    // use HasFactory;
    use Notifiable;

    protected $guard = 'admin';

    protected $fillable = [
        'name', 'email', 'password', 'role', 'nik'
    ];

    protected $hidden = ['password'];
}
