<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhyUsFeature extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getIconAttribute(?string $value): ?string
    {
        if (!$value) {
            return 'heroicon-o-star';
        }

        if (!str_starts_with($value, 'heroicon-')) {
            return "heroicon-o-{$value}";
        }

        return $value;
    }

    public function setIconAttribute(?string $value): void
    {
        if ($value && !str_starts_with($value, 'heroicon-')) {
            $value = 'heroicon-o-' . ltrim($value, '-');
        }
        $this->attributes['icon'] = $value;
    }
}
