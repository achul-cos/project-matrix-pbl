<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Rental extends Model
{
    protected $fillable = [
        'product_id', 'user_id', 'status', 'duration', 'total_price',
        'booked_start', 'booked_end', 'actual_end', 'notes',
        'activation_code', 'activation_status', 'activated_at'
    ];

    protected $casts = [
        'booked_start' => 'datetime',
        'booked_end' => 'datetime',
        'activated_at' => 'datetime',
        'actual_end' => 'datetime',
        'total_price' => 'integer',
        'duration' => 'integer',
    ];

    // ==================== RELATIONSHIPS ====================
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function product(): BelongsTo {
        return $this->belongsTo(Product::class);
    }

    public function report(): HasOne {
        return $this->hasOne(RentalReport::class);
    }

    public function activationLogs(): HasMany {
        return $this->hasMany(ActivationLog::class);
    }

    public function latestActivationLog(): HasOne {
        return $this->hasOne(ActivationLog::class)->latestOfMany();
    }

    // ==================== SCOPES ====================
    public function scopePending($query) {
        return $query->where('status', 'pending');
    }

    public function scopeCompleted($query) {
        return $query->where('status', 'completed');
    }

    public function scopeReadyToStart($query) {
        return $query->where('status', 'pending')
                    ->where('booked_start', '<=', now()->addMinutes(10));
    }

    public function scopeExpired($query) {
        return $query->where('status', 'active')
                    ->where('booked_end', '<=', now());
    }

    public function scopeActive($query) {
        return $query->where('status', 'active')
                    ->where('booked_start', '<=', now())
                    ->where('booked_end', '>=', now());
    }

    // ==================== METHODS ====================
    public function generateActivationCode(): string {
        do {
            $code = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        } while (self::where('activation_code', $code)->exists());

        $this->update(['activation_code' => $code]);
        return $code;
    }

    public function activate(array $logData = []): bool {
        DB::beginTransaction();
        try {
            $this->update([
                'status' => 'active',
                'activation_status' => 'activated',
                'activated_at' => now(),
            ]);
            
            $this->product->update(['status' => 'online']);
            $this->activationLogs()->create($logData);
            
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    // ... (lengkapi complete() dan cancel() dengan transaction)
}