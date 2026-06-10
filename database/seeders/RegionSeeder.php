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

        // 有資料就更新（UPDATE），沒有資料就新增（INSERT）
        // Model::upsert(array 資料, array 判斷重複的欄位, [array 允許更新的欄位]);
        Region::upsert(
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
                'name' => '北美洲',
                'name_en' => 'Northern America',
                'slug' => '北美洲',
                'sort' => 1,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 2,
                'name' => '中美洲',
                'name_en' => 'Central America',
                'slug' => '中美洲',
                'sort' => 2,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 3,
                'name' => '加勒比海',
                'name_en' => 'Caribbean',
                'slug' => '加勒比海',
                'sort' => 3,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 4,
                'name' => '南美洲',
                'name_en' => 'South America',
                'slug' => '南美洲',
                'sort' => 4,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 5,
                'name' => '北歐',
                'name_en' => 'Northern Europe',
                'slug' => '北歐',
                'sort' => 5,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 6,
                'name' => '西歐',
                'name_en' => 'Western Europe',
                'slug' => '西歐',
                'sort' => 6,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 7,
                'name' => '東歐',
                'name_en' => 'Eastern Europe',
                'slug' => '東歐',
                'sort' => 7,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 8,
                'name' => '南歐',
                'name_en' => 'Southern Europe',
                'slug' => '南歐',
                'sort' => 8,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 9,
                'name' => '北非',
                'name_en' => 'Northern Africa',
                'slug' => '北非',
                'sort' => 9,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 10,
                'name' => '西非',
                'name_en' => 'Western Africa',
                'slug' => '西非',
                'sort' => 10,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 11,
                'name' => '中非',
                'name_en' => 'Middle Africa',
                'slug' => '中非',
                'sort' => 11,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 12,
                'name' => '東非',
                'name_en' => 'Eastern Africa',
                'slug' => '東非',
                'sort' => 12,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 13,
                'name' => '南非',
                'name_en' => 'Southern Africa',
                'slug' => '南非',
                'sort' => 13,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 14,
                'name' => '中亞',
                'name_en' => 'Central Asia',
                'slug' => '中亞',
                'sort' => 14,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 15,
                'name' => '東亞',
                'name_en' => 'Eastern Asia',
                'slug' => '東亞',
                'sort' => 15,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 16,
                'name' => '東南亞',
                'name_en' => 'South-Eastern Asia',
                'slug' => '東南亞',
                'sort' => 16,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 17,
                'name' => '南亞',
                'name_en' => 'Southern Asia',
                'slug' => '南亞',
                'sort' => 17,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 18,
                'name' => '西亞',
                'name_en' => 'Western Asia',
                'slug' => '西亞',
                'sort' => 18,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 19,
                'name' => '澳洲與紐西蘭',
                'name_en' => 'Australia and New Zealand',
                'slug' => '澳洲與紐西蘭',
                'sort' => 19,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 20,
                'name' => '美拉尼西亞',
                'name_en' => 'Melanesia',
                'slug' => '美拉尼西亞',
                'sort' => 20,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 21,
                'name' => '密克羅尼西亞',
                'name_en' => 'Micronesia',
                'slug' => '密克羅尼西亞',
                'sort' => 21,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 22,
                'name' => '玻里尼西亞',
                'name_en' => 'Polynesia',
                'slug' => '玻里尼西亞',
                'sort' => 22,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];
    }
}
