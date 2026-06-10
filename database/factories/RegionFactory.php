<?php

namespace Database\Factories;

// Model
use App\Models\Region;
//
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Region>
 */
class RegionFactory extends Factory
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
            'name_en' => fake()->name(),
            'slug' => fake()->name(),
            'sort' => fake()->numberBetween(1, 500),
            'status' => fake()->boolean(),
        ];
    }
}
