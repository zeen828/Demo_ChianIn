<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Fortune extends Model
{
    /** @use HasFactory<\Database\Factories\FortuneFactory> */
    use HasFactory;

    // protected $table = 'fortunes';

    protected $fillable = [
        // 'id',
        'fortune_category_id',
        'fortune_no',
        'title',
        'content',
        'summary',
        'level',
        'code',
        'image',
        'memo',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'fortune_no' => 'integer',
            'status' => 'boolean',
        ];
    }

    // 需引用 Attribute 才會有作用
    protected function imageUrl(): Attribute
    {
        // 測試
        // return Attribute::make(
        //     get: fn () => 'TEST'
        // );

        // 用法:$god->image_url
        return Attribute::make(
            get: fn () => $this->image? asset($this->image) : 'https://placehold.co/320x320'
        );
    }

    // 關聯
    public function fortuneCategory(): BelongsTo
    {
        return $this->belongsTo(FortuneCategory::class, 'fortune_category_id', 'id');
    }
}
