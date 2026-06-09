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
                'name' => 'Northern America',
                'name_local' => '北美洲',
                'slug' => '北美洲',
                'sort' => 1,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 2,
                'name' => 'Central America',
                'name_local' => '中美洲',
                'slug' => '中美洲',
                'sort' => 2,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 3,
                'name' => 'Caribbean',
                'name_local' => '加勒比海',
                'slug' => '加勒比海',
                'sort' => 3,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 4,
                'name' => 'South America',
                'name_local' => '南美洲',
                'slug' => '南美洲',
                'sort' => 4,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 5,
                'name' => 'Northern Europe',
                'name_local' => '北歐',
                'slug' => '北歐',
                'sort' => 5,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 6,
                'name' => 'Western Europe',
                'name_local' => '西歐',
                'slug' => '西歐',
                'sort' => 6,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 7,
                'name' => 'Eastern Europe',
                'name_local' => '東歐',
                'slug' => '東歐',
                'sort' => 7,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 8,
                'name' => 'Southern Europe',
                'name_local' => '南歐',
                'slug' => '南歐',
                'sort' => 8,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 9,
                'name' => 'Northern Africa',
                'name_local' => '北非',
                'slug' => '北非',
                'sort' => 9,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 10,
                'name' => 'Western Africa',
                'name_local' => '西非',
                'slug' => '西非',
                'sort' => 10,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 11,
                'name' => 'Middle Africa',
                'name_local' => '中非',
                'slug' => '中非',
                'sort' => 11,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 12,
                'name' => 'Eastern Africa',
                'name_local' => '東非',
                'slug' => '東非',
                'sort' => 12,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 13,
                'name' => 'Southern Africa',
                'name_local' => '南非',
                'slug' => '南非',
                'sort' => 13,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 14,
                'name' => 'Central Asia',
                'name_local' => '中亞',
                'slug' => '中亞',
                'sort' => 14,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 15,
                'name' => 'Eastern Asia',
                'name_local' => '東亞',
                'slug' => '東亞',
                'sort' => 15,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 16,
                'name' => 'South-Eastern Asia',
                'name_local' => '東南亞',
                'slug' => '東南亞',
                'sort' => 16,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 17,
                'name' => 'Southern Asia',
                'name_local' => '南亞',
                'slug' => '南亞',
                'sort' => 17,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 18,
                'name' => 'Western Asia',
                'name_local' => '西亞',
                'slug' => '西亞',
                'sort' => 18,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 19,
                'name' => 'Australia and New Zealand',
                'name_local' => '澳洲與紐西蘭',
                'slug' => '澳洲與紐西蘭',
                'sort' => 19,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 20,
                'name' => 'Melanesia',
                'name_local' => '美拉尼西亞',
                'slug' => '美拉尼西亞',
                'sort' => 20,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 21,
                'name' => 'Micronesia',
                'name_local' => '密克羅尼西亞',
                'slug' => '密克羅尼西亞',
                'sort' => 21,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 22,
                'name' => 'Polynesia',
                'name_local' => '玻里尼西亞',
                'slug' => '玻里尼西亞',
                'sort' => 22,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];
    }
}
