<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'role',
        'is_active',
        'photo',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_admin' => 'boolean',
            'is_active' => 'boolean',
        ];
    }

    // Scope untuk admin aktif
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope untuk super admin
    public function scopeSuperAdmin($query)
    {
        return $query->where('role', 'super_admin');
    }

    // Check apakah admin adalah super admin
    public function isSuperAdmin()
    {
        return $this->role === 'super_admin';
    }

    // Accessor untuk URL foto
    public function getPhotoUrlAttribute()
    {
        if ($this->photo) {
            return asset('storage/admin_photos/' . $this->photo);
        }
        
        // Default avatar jika tidak ada foto
        return asset('img/ad/placeholder1.png');
    }

    // Accessor untuk path foto lengkap
    public function getPhotoPathAttribute()
    {
        if ($this->photo) {
            return storage_path('app/public/admin_photos/' . $this->photo);
        }
        return null;
    }
}