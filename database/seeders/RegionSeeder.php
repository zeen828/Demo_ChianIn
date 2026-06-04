<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Models
use App\Models\Region;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Region::factory(50)->create();

        $regions = [
            [
                'id' => 1,
                'name' => 'Northern America',
                'name_local' => '北美洲',
            ],
            [
                'id' => 2,
                'name' => 'Central America',
                'name_local' => '中美洲',
            ],
            [
                'id' => 3,
                'name' => 'Caribbean',
                'name_local' => '加勒比海',
            ],
            [
                'id' => 4,
                'name' => 'South America',
                'name_local' => '南美洲',
            ],
            [
                'id' => 5,
                'name' => 'Northern Europe',
                'name_local' => '北歐',
            ],
            [
                'id' => 6,
                'name' => 'Western Europe',
                'name_local' => '西歐',
            ],
            [
                'id' => 7,
                'name' => 'Eastern Europe',
                'name_local' => '東歐',
            ],
            [
                'id' => 8,
                'name' => 'Southern Europe',
                'name_local' => '南歐',
            ],
            [
                'id' => 9,
                'name' => 'Northern Africa',
                'name_local' => '北非',
            ],
            [
                'id' => 10,
                'name' => 'Western Africa',
                'name_local' => '西非',
            ],
            [
                'id' => 11,
                'name' => 'Middle Africa',
                'name_local' => '中非',
            ],
            [
                'id' => 12,
                'name' => 'Eastern Africa',
                'name_local' => '東非',
            ],
            [
                'id' => 13,
                'name' => 'Southern Africa',
                'name_local' => '南非',
            ],
            [
                'id' => 14,
                'name' => 'Central Asia',
                'name_local' => '中亞',
            ],
            [
                'id' => 15,
                'name' => 'Eastern Asia',
                'name_local' => '東亞',
            ],
            [
                'id' => 16,
                'name' => 'South-Eastern Asia',
                'name_local' => '東南亞',
            ],
            [
                'id' => 17,
                'name' => 'Southern Asia',
                'name_local' => '南亞',
            ],
            [
                'id' => 18,
                'name' => 'Western Asia',
                'name_local' => '西亞',
            ],
            [
                'id' => 19,
                'name' => 'Australia and New Zealand',
                'name_local' => '澳洲與紐西蘭',
            ],
            [
                'id' => 20,
                'name' => 'Melanesia',
                'name_local' => '美拉尼西亞',
            ],
            [
                'id' => 21,
                'name' => 'Micronesia',
                'name_local' => '密克羅尼西亞',
            ],
            [
                'id' => 22,
                'name' => 'Polynesia',
                'name_local' => '玻里尼西亞',
            ],
        ];

        foreach ($regions as $index => $region) {
            Region::create([
                'id' => $region['id'],
                'name' => $region['name'],
                'name_local' => $region['name_local'],
                'slug' => $region['name_local'],
                'sort' => $region['id'],
                'status' => true,
            ]);
        }
    }
}
