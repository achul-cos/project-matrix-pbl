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

    public function getCpuFormattedAttribute()
    {
        $cpu = strtolower($this->cpu);
        if (str_contains($cpu, 'intel')) {
            return 'intel';
        } elseif (str_contains($cpu, 'amd')) {
            return 'amd';
        }
        return null;
    }

    public function getGpuFormattedAttribute()
    {
        $gpu = strtolower($this->gpu);
        if (str_contains($gpu, 'rtx')) {
            return 'rtx';
        } elseif (str_contains($gpu, 'gtx')) {
            return 'gtx';
        }
        return null;
    }
}