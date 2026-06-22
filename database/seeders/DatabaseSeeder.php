<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Models
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // 權限角色
            RolesAndPermissionsSeeder::class,
            // 管理者
            AdminUserSeeder::class,

            RegionSeeder::class,
            CountrySeeder::class,
            CitySeeder::class,

            MainGodSeeder::class,

            SignSystemSeeder::class,
            Fortune01Seeder::class,//
            Fortune02Seeder::class,//
            FortuneTranslationSeeder::class,
            InterpretationTranslationSeeder::class,

            TempleSeeder::class,
        ]);

        User::factory(20)->user()->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

    }
}
