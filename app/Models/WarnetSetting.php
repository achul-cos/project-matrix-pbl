<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WarnetSetting extends Model
{
    protected $fillable = ['is_open', 'available_computers'];
    protected $casts = [
        'available_computers' => 'array',
        'is_open' => 'boolean',
    ];
}
