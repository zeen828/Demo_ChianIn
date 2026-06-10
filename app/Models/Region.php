<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Region extends Model
{
    /** @use HasFactory<\Database\Factories\RegionFactory> */
    use HasFactory;

    // protected $table = 'regions';

    protected $fillable = [
        // 'id',
        'name',
        'name_local',
        'slug',
        'sort',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'sort' => 'integer',
            'status' => 'boolean',
        ];
    }

    public function countries(): HasMany
    {
        return $this->hasMany(Country::class, 'region_id', 'id');
    }
}
