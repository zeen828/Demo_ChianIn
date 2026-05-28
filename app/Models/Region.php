<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    /** @use HasFactory<\Database\Factories\RegionFactory> */
    use HasFactory;

    // protected $table = 'regions';

    protected $fillable = [
        // 'id',
        'name',
        'slug',
        'sort',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
        ];
    }
}
