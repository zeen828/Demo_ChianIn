<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    /** @use HasFactory<\Database\Factories\CountryFactory> */
    use HasFactory;

    // protected $table = 'countries';

    protected $fillable = [
        // 'id',
        'region_id',
        'name',
        'name_local',
        'code',
        'slug',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'status' => 'boolean',
        ];
    }

    // 關聯
    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class, 'region_id', 'id');
    }

    // 關聯
    public function city(): HasMany
    {
        return $this->hasMany(City::class, 'country_id', 'id');
    }
}
