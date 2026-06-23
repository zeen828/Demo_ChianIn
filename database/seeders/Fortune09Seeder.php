<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Models
use App\Models\Fortune;

class Fortune09Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fortune::factory(150)->create();

        // 註生娘娘三十籤
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
                'id' => 901,
                'sign_system_id' => 9,
                'number' => 1,
                'title' => '第一籤',
                'content' => '寶馬盈門吉慶多，<br/>官司有理勸調和，<br/>萬般得利稱全福，<br/>一箭紅心定中科。',
                'level' => '上吉',
                'code' => null,
                'image' => null,
                'memo' => '善才參世尊',
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];
    }
}
