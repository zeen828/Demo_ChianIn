<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temple extends Model
{
    /** @use HasFactory<\Database\Factories\TempleFactory> */
    use HasFactory;

    // protected $table = 'temples';

    protected $fillable = [
        // 'id',
        'city_id',
        'name',
        'slug',
        'address',
        'postal_code',
        'latitude',
        'longitude',
        'phone',
        'website',
        'map_url',
        'description',
        'main_deity',
        'founded_year',
        'is_active',
        'seo_title',
        'seo_description',
    ];

    protected function casts(): array
    {
        return [
            // 'city_id',
            'latitude' => 'decimal:7',
            'longitude' => 'decimal:7',
            // 'founded_year',
            'is_active' => 'boolean',
        ];
    }
}
