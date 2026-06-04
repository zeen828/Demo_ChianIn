<?php

namespace Database\Factories;

// Model
use App\Models\Fortune;
use App\Models\SignSystem;
//
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Fortune>
 */
class FortuneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'sign_system_id' => SignSystem::factory(),// 新建對應表
            'sign_system_id' => SignSystem::query()->inRandomOrder()->value('id'),// 使用現有的ID
            'number' => fake()->numberBetween(1, 100),
            'fortune_level' => fake()->randomElement([
                '大吉',
                '吉',
                '中吉',
                '小吉',
                '凶',
                '末吉',
            ]),
            'code' => strtoupper(fake()->bothify('F###')),
            'status' => fake()->boolean(),
        ];
    }
}
