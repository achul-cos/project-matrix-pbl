<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserOtpCode extends Model
{
    protected $table = 'user_otp_codes';

    protected $fillable = [
        'email', 'otp_code', 'expires_at',
    ];

    public $timestamps = true;
}
