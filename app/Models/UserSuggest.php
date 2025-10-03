<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSuggest extends Model
{
    use HasFactory;

    protected $table = 'users_suggest';

    protected $fillable = [
        'message',
        'user_id'
    ];
}

