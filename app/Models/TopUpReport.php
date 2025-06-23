<?php


// namespace App\Models;


// use Illuminate\Database\Eloquent\Model;


// class TopUpReport extends Model
// {
//     use HasFactory;


//     protected $table = 'topup_report';


//     protected $fillable = [
//         'user_id',
//         'payment_id',
//         'qty_token',
//         'qty_bill',
//         'topup_method',
//         'payment_method',
//         'note',
//         'paid_at',
//     ];


//     protected $dates = ['paid_at'];
   
//     // Relasi ke User
//     public function user()
//     {
//         return $this->belongsTo(User::class);
//     }


//     // Relasi ke PaymentReport
//     public function payment()
//     {
//         return $this->belongsTo(PaymentReport::class, 'payment_id');
//     }
// }


// app/Models/TopupReport.php
namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class TopupReport extends Model
{
    use HasFactory;


    protected $table = 'topup_report';


    protected $fillable = [
        'user_id',
        'payment_id',
        'qty_token',
        'qty_bill',
        'topup_method',
        'payment_method',
        'note',
        'paid_at'
    ];


    protected $casts = [
        'paid_at' => 'datetime',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function paymentReport()
    {
        return $this->belongsTo(PaymentReport::class, 'payment_id');
    }
}





