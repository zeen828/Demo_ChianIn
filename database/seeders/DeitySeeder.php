<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Model
use App\Models\Deity;

class DeitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Deity::factory(150)->create();

        Deity::upsert(
            $this->datas(),
            ['id']
        );

        $this->createRelations();
    }

    private function datas(): array
    {
        $now = now();
        return [
            [
                'id' => 1,
                'name' => '觀世音菩薩',
                'slug' => 'guanyin',
                'description' => '',
                'image' => '/images/deity/guanyin.png',
                'sort' => 1,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 2,
                'name' => '媽祖',
                'slug' => 'mazu',
                'description' => '',
                'image' => '/images/deity/mazu.png',
                'sort' => 2,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 3,
                'name' => '關聖帝君',
                'slug' => 'guandi',
                'description' => '',
                'image' => '/images/deity/guandi.png',
                'sort' => 3,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 4,
                'name' => '土地公',
                'slug' => 'tudigong',
                'description' => '',
                'image' => '/images/deity/tudigong.png',
                'sort' => 4,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 5,
                'name' => '玄天上帝',
                'slug' => 'xuantian',
                'description' => '',
                'image' => '/images/deity/xuantian.png',
                'sort' => 5,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 6,
                'name' => '保生大帝',
                'slug' => 'baosheng',
                'description' => '',
                'image' => '/images/deity/baosheng.png',
                'sort' => 6,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 7,
                'name' => '城隍爺',
                'slug' => 'chenghuang',
                'description' => '',
                'image' => '/images/deity/chenghuang.png',
                'sort' => 7,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 8,
                'name' => '三太子',
                'slug' => 'santaizi',
                'description' => '',
                'image' => '/images/deity/santaizi.png',
                'sort' => 8,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 9,
                'name' => '王爺公',
                'slug' => 'wangye',
                'description' => '',
                'image' => '/images/deity/wangye.png',
                'sort' => 9,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 10,
                'name' => '月老',
                'slug' => 'yuelao',
                'description' => '',
                'image' => '/images/deity/yuelao.png',
                'sort' => 10,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 11,
                'name' => '撒旦',
                'slug' => 'satan',
                'description' => '',
                'image' => '/images/deity/satan.png',
                'sort' => 11,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];
    }

    private function createRelations(): void
    {
        $relations = [
            // 主神ID => 籤系統ID
            1 => [
                1 => ['sort' => 1, 'status' => true],
                5 => ['sort' => 5, 'status' => true],
                6 => ['sort' => 6, 'status' => true],
            ],
            2 => [
                1 => ['sort' => 1, 'status' => true],
                5 => ['sort' => 5, 'status' => true],
                6 => ['sort' => 6, 'status' => true],
            ],
            3 => [
                1 => ['sort' => 1, 'status' => true],
                5 => ['sort' => 5, 'status' => true],
                6 => ['sort' => 6, 'status' => true],
            ],
            4 => [
                1 => ['sort' => 1, 'status' => true],
                5 => ['sort' => 5, 'status' => true],
                6 => ['sort' => 6, 'status' => true],
            ],
            5 => [
                1 => ['sort' => 1, 'status' => true],
                5 => ['sort' => 5, 'status' => true],
                6 => ['sort' => 6, 'status' => true],
            ],
            6 => [
                1 => ['sort' => 1, 'status' => true],
                5 => ['sort' => 5, 'status' => true],
                6 => ['sort' => 6, 'status' => true],
            ],
            7 => [
                1 => ['sort' => 1, 'status' => true],
                5 => ['sort' => 5, 'status' => true],
                6 => ['sort' => 6, 'status' => true],
            ],
            8 => [
                1 => ['sort' => 1, 'status' => true],
                5 => ['sort' => 5, 'status' => true],
                6 => ['sort' => 6, 'status' => true],
            ],
            9 => [
                1 => ['sort' => 1, 'status' => true],
                5 => ['sort' => 5, 'status' => true],
                6 => ['sort' => 6, 'status' => true],
            ],
            10 => [
                1 => ['sort' => 1, 'status' => true],
                5 => ['sort' => 5, 'status' => true],
                6 => ['sort' => 6, 'status' => true],
            ],
            11 => [
                1 => ['sort' => 1, 'status' => true],
                5 => ['sort' => 5, 'status' => true],
                6 => ['sort' => 6, 'status' => true],
            ],
        ];

        foreach ($relations as $mainId => $systems) {
            $deity = Deity::find($mainId);
            $deity->fortuneCategories()->sync($systems);
        }
    }
}
