<?php

namespace Database\Factories;

// Models
use App\Models\User;
use Spatie\Permission\Models\Role;
//
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake('zh_TW')->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'status' => fake()->boolean(80),
            'is_admin' => fake()->boolean(80),
            'is_temple' => fake()->boolean(80),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    /**
     * 超級管理員角色
     * User::factory()->superAdmin()->create();
     */
    public function superAdmin(): static
    {
        return $this
            ->state(fn (array $attributes) => [
                'email_verified_at' => now(),
                'status' => true,
                'is_admin' => true,
                'is_temple' => true,
            ])
            ->afterCreating(function (User $user) {
                // 沒有就建立
                Role::firstOrCreate([
                    'name' => 'super_admin'
                ]);
                $user->assignRole('super_admin');
            });
    }

    /**
     * 管理員角色
     * User::factory()->admin()->create();
     */
    public function admin(): static
    {
        return $this
            ->state(fn (array $attributes) => [
                'email_verified_at' => now(),
                'status' => true,
                'is_admin' => true,
                'is_temple' => false,
            ])
            ->afterCreating(function (User $user) {
                // 沒有就建立
                Role::firstOrCreate([
                    'name' => 'admin'
                ]);
                $user->assignRole('admin');
            });
    }

    /**
     * 廟方角色
     * User::factory()->temple()->create();
     */
    public function temple(): static
    {
        return $this
            ->state(fn (array $attributes) => [
                'email_verified_at' => now(),
                'status' => true,
                'is_admin' => false,
                'is_temple' => true,
            ])
            ->afterCreating(function (User $user) {
                // 沒有就建立
                Role::firstOrCreate([
                    'name' => 'temple'
                ]);
                $user->assignRole('temple');
            });
    }

    /**
     * 使用者角色
     * User::factory()->user()->create();
     */
    public function user(): static
    {
        return $this
            ->state(fn (array $attributes) => [
                'email_verified_at' => now(),
                'status' => true,
                'is_admin' => false,
                'is_temple' => false,
            ])
            ->afterCreating(function (User $user) {
                // 沒有就建立
                Role::firstOrCreate([
                    'name' => 'user'
                ]);
                $user->assignRole('user');
            });
    }
}
