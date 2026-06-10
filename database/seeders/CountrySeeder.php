<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Models
use App\Models\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Country::factory(50)->create();

        Country::upsert(
            $this->datas(),
            ['id']
        );
    }

    private function datas(): array
    {
        $now = now();
        return [
            [
                'id' => 1,
                'region_id' => 15,
                'name' => '台灣',
                'name_en' => 'Taiwan',
                'code' => 'TW',
                'slug' => 'taiwan',
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 2,
                'region_id' => 15,
                'name' => '日本',
                'name_en' => 'Japan',
                'code' => 'JP',
                'slug' => 'japan',
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 3,
                'region_id' => 15,
                'name' => '韓國',
                'name_en' => 'South Korea',
                'code' => 'KR',
                'slug' => 'south-korea',
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 4,
                'region_id' => 15,
                'name' => '北韓',
                'name_en' => 'North Korea',
                'code' => 'KP',
                'slug' => 'north-korea',
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 5,
                'region_id' => 15,
                'name' => '中國',
                'name_en' => 'China',
                'code' => 'CN',
                'slug' => 'china',
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 6,
                'region_id' => 15,
                'name' => '香港',
                'name_en' => 'Hong Kong',
                'code' => 'HK',
                'slug' => 'hong-kong',
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 7,
                'region_id' => 15,
                'name' => '澳門',
                'name_en' => 'Macau',
                'code' => 'MO',
                'slug' => 'macau',
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 8,
                'region_id' => 15,
                'name' => '蒙古',
                'name_en' => 'Mongolia',
                'code' => 'MN',
                'slug' => 'mongolia',
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];
    }
}
