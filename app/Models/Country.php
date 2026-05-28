<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    /** @use HasFactory<\Database\Factories\CountryFactory> */
    use HasFactory;

    // protected $table = 'countries';

    protected $fillable = [
        // 'id',
        'region_id',
        'name',
        'code',
        'slug',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
        ];
    }
}
