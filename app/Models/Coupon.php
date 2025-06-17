<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = 'coupons';
    protected $fillable = [
        'name',
        'code',
        'sponsor',
        'desc',
        'qty_use',
        'qty_can_use',
        'qty_token',
    ];
    protected $dates = ['expired'];
}
