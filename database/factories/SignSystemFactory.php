<?php

namespace Database\Factories;

// Model
use App\Models\SignSystem;
//
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<SignSystem>
 */
class SignSystemFactory extends Factory
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
            'total_fortunes' => fake()->numberBetween(20, 100),
            'description' => fake('zh_TW')->paragraph(),
            'status' => fake()->boolean(),
        ];
    }
}
