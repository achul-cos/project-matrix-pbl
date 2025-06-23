<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Coupon extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'code',
        'sponsor',
        'desc',
        'qty_use',
        'qty_can_use',
        'qty_token',
        'expired'
    ];

    // protected $guarded = ['qty_use'];

    protected $casts = [
        'expired' => 'datetime',
    ];

    // protected function casts(): array
    // {
    //     return [
    //         'expired' => 'datetime',
    //     ];
    // }


    public function couponReports()
    {
        return $this->hasMany(CouponReport::class);
    }


    public function isExpired()
    {
        return $this->expired < now();
    }


    public function isUsedUp()
    {
        return $this->qty_use >= $this->qty_can_use;
    }


    public function remainingUses()
    {
        return $this->qty_can_use - $this->qty_use;
    }
}