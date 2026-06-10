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
        return [
            // 'region_id' => Region::factory(),// 新建對應表
            'region_id' => Region::query()->inRandomOrder()->value('id'),// 使用現有的ID
            'name' => fake('zh_TW')->country(),
            'name_en' => fake()->country(),
            'code' => strtoupper(fake()->lexify('??')),
            'slug' => fake()->country(),
            'status' => fake()->boolean(),
        ];
    }
}
