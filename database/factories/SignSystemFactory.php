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
        $systems = [
            ['媽祖靈籤', 'Mazu Oracle'],
            ['觀音靈籤', 'Guanyin Oracle'],
            ['關帝靈籤', 'Guan Di Oracle'],
            ['城隍靈籤', 'City God Oracle'],
        ];
        [$name, $en] = fake()->randomElement($systems);

        return [
            'name' => $name,
            'slug' => Str::slug($en),
            'total_fortunes' => fake()->numberBetween(20, 100),
            'description' => fake()->paragraph(),
            'status' => fake()->boolean(),
        ];
    }
}
