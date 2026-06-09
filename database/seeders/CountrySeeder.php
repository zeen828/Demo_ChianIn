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
                'name' => 'Taiwan',
                'name_local' => '台灣',
                'code' => 'TW',
                'slug' => 'taiwan',
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 2,
                'region_id' => 15,
                'name' => 'Japan',
                'name_local' => '日本',
                'code' => 'JP',
                'slug' => 'japan',
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 3,
                'region_id' => 15,
                'name' => 'South Korea',
                'name_local' => '韓國',
                'code' => 'KR',
                'slug' => 'south-korea',
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 4,
                'region_id' => 15,
                'name' => 'North Korea',
                'name_local' => '北韓',
                'code' => 'KP',
                'slug' => 'north-korea',
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 5,
                'region_id' => 15,
                'name' => 'China',
                'name_local' => '中國',
                'code' => 'CN',
                'slug' => 'china',
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 6,
                'region_id' => 15,
                'name' => 'Hong Kong',
                'name_local' => '香港',
                'code' => 'HK',
                'slug' => 'hong-kong',
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 7,
                'region_id' => 15,
                'name' => 'Macau',
                'name_local' => '澳門',
                'code' => 'MO',
                'slug' => 'macau',
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 8,
                'region_id' => 15,
                'name' => 'Mongolia',
                'name_local' => '蒙古',
                'code' => 'MN',
                'slug' => 'mongolia',
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];
    }
}
