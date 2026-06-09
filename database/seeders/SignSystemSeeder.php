<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Models
use App\Models\SignSystem;

class SignSystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // SignSystem::factory(50)->create();

        SignSystem::upsert(
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
                'name' => '雷雨師一百籤',
                'slug' => '100',
                'total_fortunes' => '100',
                'description' => '臺北行天宮、新竹城隍廟等採用，是百首級籤詩中最普遍的籤詩，而且也是最符合生活實用的籤詩。',
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 2,
                'name' => '六十甲子籤',
                'slug' => '60',
                'total_fortunes' => '60',
                'description' => '常見於媽祖廟，是六十首籤詩中最普遍的。',
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 3,
                'name' => '觀音一百籤',
                'slug' => '100',
                'total_fortunes' => '100',
                'description' => '常見於觀音寺，例如台北市龍山寺，在百首籤詩中普遍性僅次於雷雨師一百籤，但是這本籤詩在各地差異很大。',
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 4,
                'name' => '保生大帝六十籤',
                'slug' => '60',
                'total_fortunes' => '60',
                'description' => '因為主祀保生大帝的宮廟似乎沒有特定的常用籤詩，所以我們以台北保安宮籤詩為準 （新北市樹林市濟安宮主祀　保生大帝，也採用此本），歡迎參考。',
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 5,
                'name' => '觀音二十四籤',
                'slug' => '24',
                'total_fortunes' => '24',
                'description' => '見於台灣少數觀音寺，例如台灣新竹縣五指山觀音禪寺。',
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 6,
                'name' => '觀音二十八籤',
                'slug' => '28',
                'total_fortunes' => '28',
                'description' => '僅為資料收集，在台灣尚未在寺廟裡拜閱過，近期在資料收集時，查到台灣雲林縣北港鎮的廟宇可能有採用，後來確認高雄縣內門鄉紫竹寺採用此籤，並有完整籤解。',
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 7,
                'name' => '澎湖天后宮一百籤',
                'slug' => '100',
                'total_fortunes' => '100',
                'description' => '澎湖天后宮、台南大天后宮、鹿港天后宮 、白沙屯拱天宮、台北關渡宮、澎湖講美龍德宮均採用此本籤詩。',
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 8,
                'name' => '金錢掛三二籤',
                'slug' => '32',
                'total_fortunes' => '32',
                'description' => '新北市中和市南山福德宮（烘爐地）、南投縣魚池鄉啟示玄機院（孔明廟 ）等少量宮廟採用此本籤詩，金錢卦也使用這一組卦解， 但是這本籤詩各處差異很大，所以我們建議凡是在採用三十二籤的宮廟求籤，一定要記得求得的籤詩內文（壞籤盡量不要帶回），以免和其他版本混淆。',
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 9,
                'name' => '註生娘娘三十籤',
                'slug' => '30',
                'total_fortunes' => '30',
                'description' => '這本三十首籤詩，除了指點生育之外，也指點訴訟勝負之道。',
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 10,
                'name' => '東京淺草觀音寺一百籤',
                'slug' => '100',
                'total_fortunes' => '100',
                'description' => '除了東京淺草寺 LIVE直播，奈良東大寺、京都金閣寺（不動明王）、京都清水寺也是用這一本籤詩（需注意籤序可能不同），但不是所有佛寺都用這本籤詩。',
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];
    }
}
