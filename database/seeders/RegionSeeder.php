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

        Region::factory()->create([
            'id' => 1,
            'name' => '北美洲',
            'name_local' => 'Northern America',
            'slug' => 'Northern America',
            'sort' => 1,
            'status' => true,
        ]);

        Region::factory()->create([
            'id' => 2,
            'name' => '中美洲',
            'name_local' => 'Central America',
            'slug' => 'Central America',
            'sort' => 2,
            'status' => true,
        ]);

        Region::factory()->create([
            'id' => 3,
            'name' => '加勒比海',
            'name_local' => 'Caribbean',
            'slug' => 'Caribbean',
            'sort' => 3,
            'status' => true,
        ]);

        Region::factory()->create([
            'id' => 4,
            'name' => '南美洲',
            'name_local' => 'South America',
            'slug' => 'South America',
            'sort' => 4,
            'status' => true,
        ]);

        Region::factory()->create([
            'id' => 5,
            'name' => '北歐',
            'name_local' => 'Northern Europe',
            'slug' => 'Northern Europe',
            'sort' => 5,
            'status' => true,
        ]);

        Region::factory()->create([
            'id' => 6,
            'name' => '西歐',
            'name_local' => 'Western Europe',
            'slug' => 'Western Europe',
            'sort' => 6,
            'status' => true,
        ]);

        Region::factory()->create([
            'id' => 7,
            'name' => '東歐',
            'name_local' => 'Eastern Europe',
            'slug' => 'Eastern Europe',
            'sort' => 7,
            'status' => true,
        ]);

        Region::factory()->create([
            'id' => 8,
            'name' => '南歐',
            'name_local' => 'Southern Europe',
            'slug' => 'Southern Europe',
            'sort' => 8,
            'status' => true,
        ]);

        Region::factory()->create([
            'id' => 9,
            'name' => '北非',
            'name_local' => 'Northern Africa',
            'slug' => 'Northern Africa',
            'sort' => 9,
            'status' => true,
        ]);

        Region::factory()->create([
            'id' => 10,
            'name' => '西非',
            'name_local' => 'Western Africa',
            'slug' => 'Western Africa',
            'sort' => 10,
            'status' => true,
        ]);

        Region::factory()->create([
            'id' => 11,
            'name' => '中非',
            'name_local' => 'Middle Africa',
            'slug' => 'Middle Africa',
            'sort' => 11,
            'status' => true,
        ]);

        Region::factory()->create([
            'id' => 12,
            'name' => '東非',
            'name_local' => 'Eastern Africa',
            'slug' => 'Eastern Africa',
            'sort' => 12,
            'status' => true,
        ]);

        Region::factory()->create([
            'id' => 13,
            'name' => '南非',
            'name_local' => 'outhern Africa',
            'slug' => 'outhern Africa',
            'sort' => 13,
            'status' => true,
        ]);

        Region::factory()->create([
            'id' => 14,
            'name' => '中亞',
            'name_local' => 'Central Asia',
            'slug' => 'Central Asia',
            'sort' => 14,
            'status' => true,
        ]);

        Region::factory()->create([
            'id' => 15,
            'name' => '東亞',
            'name_local' => 'Eastern Asia',
            'slug' => 'Eastern Asia',
            'sort' => 15,
            'status' => true,
        ]);

        Region::factory()->create([
            'id' => 16,
            'name' => '東南亞',
            'name_local' => 'South-Eastern Asia',
            'slug' => 'South-Eastern Asia',
            'sort' => 16,
            'status' => true,
        ]);

        Region::factory()->create([
            'id' => 17,
            'name' => '南亞',
            'name_local' => 'Southern Asia',
            'slug' => 'Southern Asia',
            'sort' => 17,
            'status' => true,
        ]);

        Region::factory()->create([
            'id' => 18,
            'name' => '西亞',
            'name_local' => 'Western Asia',
            'slug' => 'Western Asia',
            'sort' => 18,
            'status' => true,
        ]);

        Region::factory()->create([
            'id' => 19,
            'name' => '澳洲與紐西蘭',
            'name_local' => 'Australia and New Zealand',
            'slug' => 'Australia and New Zealand',
            'sort' => 19,
            'status' => true,
        ]);

        Region::factory()->create([
            'id' => 20,
            'name' => '美拉尼西亞',
            'name_local' => 'Melanesia',
            'slug' => 'Melanesia',
            'sort' => 20,
            'status' => true,
        ]);

        Region::factory()->create([
            'id' => 21,
            'name' => '密克羅尼西亞',
            'name_local' => 'Micronesia',
            'slug' => 'Micronesia',
            'sort' => 21,
            'status' => true,
        ]);

        Region::factory()->create([
            'id' => 22,
            'name' => '玻里尼西亞',
            'name_local' => 'Polynesia',
            'slug' => 'Polynesia',
            'sort' => 22,
            'status' => true,
        ]);
    }
}
