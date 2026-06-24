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
        'seo_title',
        'seo_description',
        'status',
    ];

    protected function casts(): array
    {
        return [
            // 'city_id',
            'latitude' => 'decimal:7',
            'longitude' => 'decimal:7',
            // 'founded_year',
            'status' => 'boolean',
        ];
    }

    // 關聯
    public function fortuneCategories()
    {
        return $this->belongsToMany(FortuneCategory::class, 'temples_fortune_categories', 'temple_id', 'fortune_category_id')
            ->withPivot(['sort', 'status'])
            ->withTimestamps();
    }
}
