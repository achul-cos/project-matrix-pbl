<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CouponReport extends Model
{
    protected $table = 'coupons_report';

    protected $fillable = [
        'user_id',
        'coupon_id',
    ];
}
