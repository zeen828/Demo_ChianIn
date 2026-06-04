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
        return [
            // 'country_id' => Country::factory(),// 新建對應表
            'country_id' => Country::query()->inRandomOrder()->value('id'),// 使用現有的ID
            'name' => fake('zh_TW')->city(),
            'name_local' => fake()->city(),
            'slug' => fake()->city(),
            'latitude' => fake()->latitude(),
            'longitude' => fake()->longitude(),
            'status' => fake()->boolean(),
        ];
    }
}
