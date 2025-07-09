<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User; // Tambah ini juga ya

class Transaction extends Model
{
    protected $fillable = [
        'user_id',
        'order_id',
        'token_amount',
        'total_price',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
