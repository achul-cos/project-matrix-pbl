<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'phone',
        'photo',
        'token',
        'is_block',
        'is_google',
        'last_online',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'last_online' => 'datetime',
        ];
    }
    // Relasi ke payment reports
    public function paymentReports()
    {
        return $this->hasMany(PaymentReport::class);
    }

    // Relasi ke topup reports
    public function topupReports()
    {
        return $this->hasMany(TopUpReport::class);
    }
    public function getPhotoUrlAttribute()
    {
        if (!$this->photo) {
            return asset('img/ad/placeholder1.png');
        }

        if (Str::startsWith($this->photo, ['http://', 'https://'])) {
            return $this->photo;
        }

        return asset('storage/' . $this->photo);
    }

}
