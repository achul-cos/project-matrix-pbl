<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentReport extends Model
{
    use HasFactory;

    protected $table = 'payment_report';

    protected $fillable = [
        'user_id',
        'user_username',
        'midtrans_id',
        'qty_bill',
        'payment_method',
        'status',
        'payment_start',
        'payment_end',
        'note',
        'payment_photo',
    ];

    protected $dates = ['payment_start', 'payment_end'];
    
    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke TopUpReport
    public function topups()
    {
        return $this->hasMany(TopUpReport::class, 'payment_id');
    }
}
