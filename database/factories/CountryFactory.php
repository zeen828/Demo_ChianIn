<?php

namespace Database\Factories;

// Model
use App\Models\Region;
use App\Models\Country;
//
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Country>
 */
class CountryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name_local = fake()->country();

        return [
            'region_id' => Region::factory(),
            'name' => fake('zh_TW')->country(),
            'name_local' => $name_local,
            'code' => strtoupper(fake()->lexify('??')),
            'slug' => Str::slug($name_local),
            'status' => fake()->boolean(),
        ];
    }
}
