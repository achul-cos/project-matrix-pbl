<?php
namespace App\Models;

// ===================================================================
// Model: RentalReport
// File: app/Models/RentalReport.php
// ===================================================================

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RentalReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'rental_id',
        'product_id',
        'user_id',
        'start_time',
        'end_time',
        'duration',
        'total_price',
        'status',
        'overtime_minutes',
        'overtime_charge',
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'duration' => 'integer',
        'total_price' => 'integer',
        'overtime_minutes' => 'integer',
        'overtime_charge' => 'decimal:2',
    ];

    // ===================================================================
    // RELATIONSHIPS
    // ===================================================================

    /**
     * Report belongs to a Rental
     */
    public function rental(): BelongsTo
    {
        return $this->belongsTo(Rental::class);
    }

    /**
     * Report belongs to a Product
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Report belongs to a User
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // ===================================================================
    // SCOPES
    // ===================================================================

    /**
     * Scope untuk report yang completed
     */
    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    /**
     * Scope untuk report yang cancelled
     */
    public function scopeCancelled($query)
    {
        return $query->where('status', 'cancelled');
    }

    /**
     * Scope untuk report yang overtime
     */
    public function scopeOvertime($query)
    {
        return $query->where('status', 'overtime');
    }

    /**
     * Scope untuk periode tertentu
     */
    public function scopePeriod($query, $startDate, $endDate)
    {
        return $query->whereBetween('start_time', [$startDate, $endDate]);
    }

    // ===================================================================
    // ACCESSORS
    // ===================================================================

    /**
     * Get actual duration in minutes
     */
    public function getActualDurationAttribute(): int
    {
        if (!$this->start_time || !$this->end_time) {
            return 0;
        }

        return $this->start_time->diffInMinutes($this->end_time);
    }

    /**
     * Get formatted total price
     */
    public function getFormattedTotalPriceAttribute(): string
    {
        return 'Rp ' . number_format($this->total_price, 0, ',', '.');
    }

    /**
     * Get formatted overtime charge
     */
    public function getFormattedOvertimeChargeAttribute(): string
    {
        if (!$this->overtime_charge) {
            return '-';
        }

        return 'Rp ' . number_format($this->overtime_charge, 0, ',', '.');
    }

    /**
     * Get final total (total_price + overtime_charge)
     */
    public function getFinalTotalAttribute(): int
    {
        return $this->total_price + ($this->overtime_charge ?? 0);
    }

    /**
     * Get formatted final total
     */
    public function getFormattedFinalTotalAttribute(): string
    {
        return 'Rp ' . number_format($this->final_total, 0, ',', '.');
    }

    // Hitung durasi sebenarnya dalam menit
    public function actualDurationInMinutes(): int
    {
        return $this->end_time->diffInMinutes($this->start_time);
    }    
}