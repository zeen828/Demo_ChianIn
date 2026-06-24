<?php

namespace Database\Factories;

// Model
use App\Models\Deity;
//
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Deity>
 */
class DeityFactory extends Factory
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
            'slug' => fake()->name(),
            'description' => fake('zh_TW')->paragraphs(3, true),
            'image' => null,
            'sort' => fake()->numberBetween(1, 100),
            'status' => fake()->boolean(80),
        ];
    }
}
