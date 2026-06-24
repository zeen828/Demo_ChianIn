<?php

namespace Database\Factories;

// Model
use App\Models\Fortune;
use App\Models\FortuneCategory;
//
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Fortune>
 */
class FortuneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'fortune_category_id' => FortuneCategory::factory(),// 新建對應表
            'fortune_category_id' => FortuneCategory::query()->inRandomOrder()->value('id'),// 使用現有的ID
            'fortune_no' => fake()->numberBetween(1, 100),
            'title' => fake('zh_TW')->title(),
            'content' => fake('zh_TW')->paragraphs(3, true),
            'summary' => fake('zh_TW')->paragraphs(3, true),
            'level' => fake()->randomElement([
                '大吉',
                '吉',
                '中吉',
                '小吉',
                '凶',
                '末吉',
            ]),
            'code' => strtoupper(fake()->bothify('F###')),
            'image' => null,
            'memo' => fake('zh_TW')->paragraphs(3, true),
            'status' => fake()->boolean(80),
        ];
    }
}
