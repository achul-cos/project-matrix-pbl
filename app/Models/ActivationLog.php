<?php
namespace App\Models;

// ===================================================================
// Model: ActivationLog
// File: app/Models/ActivationLog.php
// ===================================================================

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ActivationLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'rental_id',
        'product_id',
        'user_id',
        'activated_at',
        'ip_address',
        'device_info',
    ];

    protected $casts = [
        'activated_at' => 'datetime',
    ];

    // ===================================================================
    // RELATIONSHIPS
    // ===================================================================

    /**
     * Log belongs to a Rental
     */
    public function rental(): BelongsTo
    {
        return $this->belongsTo(Rental::class);
    }

    /**
     * Log belongs to a Product
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Log belongs to a User
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // ===================================================================
    // SCOPES
    // ===================================================================

    /**
     * Scope untuk log hari ini
     */
    public function scopeToday($query)
    {
        return $query->whereDate('activated_at', today());
    }

    /**
     * Scope untuk periode tertentu
     */
    public function scopePeriod($query, $startDate, $endDate)
    {
        return $query->whereBetween('activated_at', [$startDate, $endDate]);
    }

    /**
     * Scope berdasarkan IP address
     */
    public function scopeFromIp($query, $ipAddress)
    {
        return $query->where('ip_address', $ipAddress);
    }

    // ===================================================================
    // ACCESSORS
    // ===================================================================

    /**
     * Get formatted activated time
     */
    public function getFormattedActivatedAtAttribute(): string
    {
        return $this->activated_at->format('d/m/Y H:i:s');
    }

    /**
     * Get device info or default
     */
    public function getDeviceInfoDisplayAttribute(): string
    {
        return $this->device_info ?? 'Unknown Device';
    }

    /**
     * Get IP address or default
     */
    public function getIpAddressDisplayAttribute(): string
    {
        return $this->ip_address ?? 'Unknown IP';
    }

    // ===================================================================
    // METHODS
    // ===================================================================

    /**
     * Create log from request
     */
    public static function createFromRequest($rental, $request): self
    {
        return self::create([
            'rental_id' => $rental->id,
            'product_id' => $rental->product_id,
            'user_id' => $rental->user_id,
            'activated_at' => now(),
            'ip_address' => $request->ip(),
            'device_info' => $request->userAgent(),
        ]);
    }

}
