<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getIconAttribute(?string $value): ?string
    {
        if ($value && str_starts_with($value, 'heroicon-o-fi ')) {
            return substr($value, 11);
        }

        return $value ?: 'heroicon-o-check-circle';
    }
}
