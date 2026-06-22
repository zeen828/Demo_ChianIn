<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Models
use App\Models\MainGod;

class MainGodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // MainGod::factory(50)->create();

        MainGod::upsert(
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
                'name' => '觀世音菩薩',
                'slug' => 'guanyin',
                'description' => '',
                'image' => '/images/main_god/guanyin.png',
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
                'image' => '/images/main_god/mazu.png',
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
                'image' => '/images/main_god/guandi.png',
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
                'image' => '/images/main_god/tudigong.png',
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
                'image' => '/images/main_god/xuantian.png',
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
                'image' => '/images/main_god/baosheng.png',
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
                'image' => '/images/main_god/chenghuang.png',
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
                'image' => '/images/main_god/santaizi.png',
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
                'image' => '/images/main_god/wangye.png',
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
                'image' => '/images/main_god/yuelao.png',
                'sort' => 10,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];
    }
}
