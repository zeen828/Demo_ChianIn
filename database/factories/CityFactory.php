<?php

namespace Database\Factories;

// Model
use App\Models\Country;
use App\Models\City;
//
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<City>
 */
class CityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name_local = fake()->city();

        return [
            'country_id' => Country::factory(),
            'name' => fake('zh_TW')->city(),
            'name_local' => $name_local,
            'slug' => Str::slug($name_local),
            'latitude' => fake()->latitude(),
            'longitude' => fake()->longitude(),
            'status' => fake()->boolean(),
        ];
    }
}
