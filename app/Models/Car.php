<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Car extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = [];

    protected $casts = [
        'year' => 'integer',
        'price' => 'decimal:2',
        'original_price' => 'decimal:2',
        'monthly_payment' => 'decimal:2',
        'rating' => 'decimal:1',
        'is_featured' => 'boolean',
        'mileage' => 'integer',
    ];

    public function getEstimatedMonthlyPaymentAttribute(): float
    {
        if ($this->monthly_payment && $this->monthly_payment > 0) {
            return (float) $this->monthly_payment;
        }

        // Standard estimate: 20% down payment, 48-month term, ~7% annual interest estimate
        if ($this->price > 0) {
            $principal = (float) $this->price * 0.8;
            return round(($principal * 1.14) / 48, 0);
        }

        return 0;
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function carType(): BelongsTo
    {
        return $this->belongsTo(CarType::class);
    }

    public function fuelType(): BelongsTo
    {
        return $this->belongsTo(FuelType::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function amenities(): BelongsToMany
    {
        return $this->belongsToMany(Amenity::class);
    }

    public function inquiries(): HasMany
    {
        return $this->hasMany(Inquiry::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
}
