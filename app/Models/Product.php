<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'code', 'cpu', 'gpu',
        'ram', 'floor', 'price', 'rating',
        'room', 'status',
        'book_start', 'book_end',
        'image1', 'image2', 'image3', 'image4', 'desc', 'rent'
    ];
}