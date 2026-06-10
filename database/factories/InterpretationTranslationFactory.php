<?php

namespace Database\Factories;

// Model
use App\Models\InterpretationTranslation;
use App\Models\Fortune;
//
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<InterpretationTranslation>
 */
class InterpretationTranslationFactory extends Factory
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
            'general_interpretation' => fake()->paragraph(),
            'love' => fake()->sentence(),
            'career' => fake()->sentence(),
            'wealth' => fake()->sentence(),
            'health' => fake()->sentence(),
            'exam' => fake()->sentence(),
            'travel' => fake()->sentence(),
            'relationship' => fake()->sentence(),
            'lawsuit' => fake()->sentence(),
            'lost_item' => fake()->sentence(),
            'status' => fake()->boolean(80),
        ];
    }
}
