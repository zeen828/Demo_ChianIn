<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /** @use HasFactory<\Database\Factories\CityFactory> */
    use HasFactory;

    // protected $table = 'cities';

    protected $fillable = [
        // 'id',
        'country_id',
        'name',
        'slug',
        'latitude',
        'longitude',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
        ];
    }
}
