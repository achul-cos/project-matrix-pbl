<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    // 1. Daftarkan kolom yang bisa diisi (mass assignment)
    protected $fillable = [
        'name',
        'deskripsi',
        'image1',
        'link',
        'tanggal', // Pastikan ini ada
        'status'
    ];

    // 2. Konversi kolom tanggal ke objek Carbon
    protected $dates = [
        'tanggal',
        'created_at',
        'updated_at'
    ];

    // 3. (Opsional) Format tampilan tanggal
    public function getFormattedTanggalAttribute()
    {
        return $this->tanggal->format('d F Y'); // Contoh: "20 Juni 2025"
    }
}