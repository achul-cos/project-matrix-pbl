<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = [
        'name', 'code', 'cpu', 'gpu',
        'ram', 'floor', 'price', 'rating',
        'room', 'status',
        'book_start', 'book_end',
        'image1', 'image2', 'image3', 'image4', 'desc', 'rent', 'overtime_price'
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

    public function activeRental()
    {
        return $this->hasOne(Rental::class)
            ->whereIn('status', ['pending', 'active'])
            ->latest();
    }

    // Tambahkan relasi ke rental
    public function rentals(): HasMany
    {
        return $this->hasMany(Rental::class);
    }

    // Tambahkan relasi ke rental reports
    public function rentalReports(): HasMany
    {
        return $this->hasMany(RentalReport::class);
    }

    // Hitung harga overtime per menit
    public function overtimePricePerMinute(): float
    {
        return $this->price / 60;
    }    
}