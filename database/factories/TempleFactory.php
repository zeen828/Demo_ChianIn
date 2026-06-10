<?php

namespace Database\Factories;

use App\Models\Temple;
use Illuminate\Database\Eloquent\Factories\Factory;
// Models
use App\Models\City;

/**
 * @extends Factory<Temple>
 */
class TempleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $templeName = fake('zh_TW')->unique()->company() . '宮';

        return [
            // 'city_id' => City::factory(),
            'city_id' => City::query()->inRandomOrder()->value('id'),// 使用現有的ID
            'name' => $templeName,
            'slug' => fake()->unique()->slug(),
            'address' => fake('zh_TW')->address(),
            'postal_code' => fake('zh_TW')->postcode(),
            'latitude' => fake()->latitude(21.8, 25.3),
            'longitude' => fake()->longitude(119.0, 122.1),
            'phone' => fake()->phoneNumber(),
            'website' => fake()->optional()->url(),
            'map_url' => fake()->optional()->url(),
            'description' => fake('zh_TW')->paragraphs(3, true),
            'main_deity' => fake()->randomElement([
                '觀世音菩薩',
                '媽祖',
                '關聖帝君',
                '土地公',
                '玄天上帝',
                '保生大帝',
                '城隍爺',
                '三太子',
                '王爺',
            ]),
            'founded_year' => fake()->numberBetween(1901, now()->year),
            'seo_title' => $templeName,
            'seo_description' => fake('zh_TW')->sentence(20),
            'status' => fake()->boolean(80),
        ];
    }
}
