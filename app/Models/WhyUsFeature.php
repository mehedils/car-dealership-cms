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
        return $value ?: 'heroicon-o-star';
    }
}
