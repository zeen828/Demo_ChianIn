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

            // MainGodSeeder::class,
            DeitySeeder::class,

            // SignSystemSeeder::class,
            FortuneCategorySeeder::class,
            Fortune01Seeder::class,// 雷雨師一百籤
            Fortune02Seeder::class,// 六十甲子籤
            Fortune03Seeder::class,// 觀音一百籤
            Fortune04Seeder::class,// 保生大帝六十籤
            Fortune05Seeder::class,// 觀音二四籤
            Fortune06Seeder::class,// 觀音二八籤
            Fortune07Seeder::class,// 澎湖天后宮一百籤
            Fortune08Seeder::class,// 金錢卦三二籤
            Fortune09Seeder::class,// 註生娘娘三十籤
            Fortune10Seeder::class,// 東京淺草觀音寺-一百籤

            // FortuneTranslationSeeder::class,
            // InterpretationTranslationSeeder::class,

            TempleSeeder::class,
        ]);

        User::factory(20)->user()->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

    }
}
