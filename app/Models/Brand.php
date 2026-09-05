<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brand extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function cars(): HasMany
    {
        return $this->hasMany(Car::class);
    }

    public function getLogoUrlAttribute(): ?string
    {
        if (empty($this->logo)) {
            return null;
        }

        if (str_starts_with($this->logo, 'http') || str_starts_with($this->logo, '/')) {
            return $this->logo;
        }

        if (str_starts_with($this->logo, 'assets/')) {
            return asset($this->logo);
        }

        return asset('storage/' . $this->logo);
    }
}
