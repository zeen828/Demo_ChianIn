<?php

namespace Database\Factories;

// Model
use App\Models\FortuneCategory;
//
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<FortuneCategory>
 */
class FortuneCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake('zh_TW')->name(),
            'slug' => fake()->unique()->slug(),
            'description' => fake('zh_TW')->paragraph(),
            'total_lots' => fake()->numberBetween(20, 100),
            'sort' => fake()->numberBetween(1, 100),
            'status' => fake()->boolean(80),
        ];
    }
}
