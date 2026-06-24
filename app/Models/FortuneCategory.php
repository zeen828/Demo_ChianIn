<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FortuneCategory extends Model
{
    /** @use HasFactory<\Database\Factories\FortuneCategoryFactory> */
    use HasFactory;

    // protected $table = 'fortune_categories';

    protected $fillable = [
        // 'id',
        'name',
        'slug',
        'description',
        'total_lots',
        'sort',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'total_lots' => 'integer',
            'sort' => 'integer',
            'status' => 'boolean',
        ];
    }

    // 關聯
    public function deities()
    {
        return $this->belongsToMany(Deity::class, 'deities_fortune_categories', 'fortune_category_id', 'deity_id')
            ->withPivot(['sort', 'status'])
            ->withTimestamps();
    }

    // 關聯
    public function temples()
    {
        return $this->belongsToMany(Temple::class, 'temples_fortune_categories', 'fortune_category_id', 'deity_id')
            ->withPivot(['sort', 'status'])
            ->withTimestamps();
    }

    // 關聯
    public function fortunes(): HasMany
    {
        return $this->hasMany(Fortune::class, 'fortune_category_id', 'id');
    }
}
