<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Deity extends Model
{
    /** @use HasFactory<\Database\Factories\DeityFactory> */
    use HasFactory;

    // protected $table = 'deities';

    protected $fillable = [
        // 'id',
        'name',
        'slug',
        'description',
        'image',
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
    public function fortuneCategories()
    {
        // 查詢
        // $deity = Deity::with('fortuneCategories')->find($id);
        // $deity = Deity::with('fortuneCategories')->where('slug', $name)->first();
        // 新增
        // $deity->fortuneCategories()->attach($systemId);
        // $deity->fortuneCategories()->attach($systemId, ['sort'=>1, 'status'=>true]);
        // 同步
        // $god->fortuneCategories()->sync([1 => ['sort'=>1], 2 => ['sort'=>2]]);

        return $this->belongsToMany(FortuneCategory::class, 'deities_fortune_categories', 'deity_id', 'fortune_category_id')
            ->withPivot(['sort', 'status'])
            ->withTimestamps();
    }
}
