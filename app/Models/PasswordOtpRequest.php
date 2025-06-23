<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordOtpRequest extends Model
{
    protected $fillable = [
        'phone_number',
        'otp_code',
        'expires_at',
    ];

    public $timestamps = true;

    protected $fillable = ['email', 'otp_code', 'expires_at'];
}

