<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Models
use App\Models\Fortune;

class Fortune03Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fortune::factory(150)->create();

        // 觀音一百籤
        Fortune::upsert(
            $this->datas(),
            ['id']
        );
    }

    private function datas(): array
    {
        $now = now();
        return [
            [
                'id' => 301,
                'fortune_category_id' => 3,
                'fortune_no' => 1,
                'title' => '第一籤',
                'content' => '寶馬盈門吉慶多，<br/>官司有理勸調和，<br/>萬般得利稱全福，<br/>一箭紅心定中科。',
                'summary' => '善才參世尊',
                'level' => '上吉',
                'code' => null,
                'image' => null,
                'memo' => null,
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];
    }
}
