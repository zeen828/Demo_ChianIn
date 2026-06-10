<?php

namespace Database\Factories;

// Model
use App\Models\FortuneTranslation;
use App\Models\Fortune;
//
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<FortuneTranslation>
 */
class FortuneTranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'fortune_id' => Fortune::factory(),
            'fortune_id' => Fortune::query()->inRandomOrder()->value('id'),// 使用現有的ID
            'locale' => fake()->randomElement(['zh_TW', 'en', 'ja']),
            'title' => fake()->sentence(3),
            'poem' => fake()->paragraph(4),
            'summary' => fake()->sentence(10),
            'status' => fake()->boolean(80),
        ];
    }
}
