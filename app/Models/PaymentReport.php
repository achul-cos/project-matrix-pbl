<?php


// namespace App\Models;


// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;


// class PaymentReport extends Model
// {
//     use HasFactory;


//     protected $table = 'payment_report';


//     protected $fillable = [
//         'user_id',
//         'user_username',
//         'midtrans_id',
//         'qty_bill',
//         'payment_method',
//         'status',
//         'payment_start',
//         'payment_end',
//         'note',
//         'payment_photo',
//     ];


//     protected $dates = ['payment_start', 'payment_end'];

//     // Relasi ke User
//     public function user()
//     {
//         return $this->belongsTo(User::class);
//     }


//     // Relasi ke TopUpReport
//     public function topups()
//     {
//         return $this->hasMany(TopUpReport::class, 'payment_id');
//     }
// }


// app/Models/PaymentReport.php
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
        'paid_at',
        'note',
        'payment_photo',
        'external_id',  // Pastikan ini ada
        'invoice_id',   // Pastikan ini ada juga
        'checkout_link',
    ];


    protected $casts = [
        'payment_start' => 'datetime',
        'payment_end' => 'datetime',
        'paid_at' => 'datetime',
    ];

    // app/Models/PaymentReport.php
    public function topup()
    {
        return $this->hasOne(TopupReport::class, 'payment_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function topupReport()
    {
        return $this->hasOne(TopUpReport::class, 'payment_id');
    }
}
