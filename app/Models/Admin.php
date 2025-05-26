<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'admin'; // Nama tabel

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'username',
        'password',
        'role',
        'last_online',
        'photo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     */
    protected $hidden = [
        'password',
        'remember_token', // jika menggunakan fitur remember token
    ];

    /**
     * The attributes that should be cast to native types.
     */
    protected $casts = [
        'last_online' => 'datetime',
    ];
}
