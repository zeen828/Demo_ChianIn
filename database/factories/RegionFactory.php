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
        $name_local = fake()->name();

        return [
            'name' => fake('zh_TW')->name(),
            'name_local' => $name_local,
            'slug' => Str::slug($name_local),
            'sort' => fake()->numberBetween(1, 100),
            'status' => fake()->boolean(),
        ];
    }
}
