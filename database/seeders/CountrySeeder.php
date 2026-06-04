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

        $countries = [
            [
                'id' => 1,
                'region_id' => 15,
                'name' => 'Taiwan',
                'name_local' => '台灣',
                'code' => 'TW',
                'slug' => 'taiwan',
            ],
            [
                'id' => 2,
                'region_id' => 15,
                'name' => 'Japan',
                'name_local' => '日本',
                'code' => 'JP',
                'slug' => 'japan',
            ],
            [
                'id' => 3,
                'region_id' => 15,
                'name' => 'South Korea',
                'name_local' => '韓國',
                'code' => 'KR',
                'slug' => 'south-korea',
            ],
            [
                'id' => 4,
                'region_id' => 15,
                'name' => 'North Korea',
                'name_local' => '北韓',
                'code' => 'KP',
                'slug' => 'north-korea',
            ],
            [
                'id' => 5,
                'region_id' => 15,
                'name' => 'China',
                'name_local' => '中國',
                'code' => 'CN',
                'slug' => 'china',
            ],
            [
                'id' => 6,
                'region_id' => 15,
                'name' => 'Hong Kong',
                'name_local' => '香港',
                'code' => 'HK',
                'slug' => 'hong-kong',
            ],
            [
                'id' => 7,
                'region_id' => 15,
                'name' => 'Macau',
                'name_local' => '澳門',
                'code' => 'MO',
                'slug' => 'macau',
            ],
            [
                'id' => 8,
                'region_id' => 15,
                'name' => 'Mongolia',
                'name_local' => '蒙古',
                'code' => 'MN',
                'slug' => 'mongolia',
            ],
        ];

        foreach ($countries as $key=>$countrion) {
            Country::factory()->create([
                'id' => $countrion['id'],
                'region_id' => $countrion['region_id'],
                'name' => $countrion['name'],
                'name_local' => $countrion['name_local'],
                'code' => $countrion['code'],
                'slug' => $countrion['slug'],
                'status' => true,
            ]);
        }
    }
}
