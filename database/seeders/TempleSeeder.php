<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Models
use App\Models\Temple;

class TempleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Temple::factory(50)->create();

        Temple::upsert(
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
                'city_id' => 1,
                'name' => '行天宮',
                'slug' => 'stg',
                'address' => '台灣台北市中山區民權東路二段109號',
                'postal_code' => '104071',
                'latitude' => 25.06332107373528,
                'longitude' => 121.53394359998609,
                'phone' => null,
                'website' => 'https://www.ht.org.tw/',
                'map_url' => 'https://maps.app.goo.gl/Hmh1EFxiuCPMeWos8',
                'description' => '行天宮，或稱恩主公廟，位於臺灣臺北市中山區，又稱臺北關帝廟，主神為關聖帝君、呂恩主洞賓、張恩主單、王恩主善、岳恩主飛等五聖恩主，是臺灣知名的關帝廟，由經營煤礦事業有成的黃玄空道長所建設而成。本宮另有兩座分宮，位於臺北市北投區忠義山及新北市三峽區白雞山，稱「行天三宮」。',
                'main_deity' => '關聖帝君',
                'founded_year' => 1967,
                'seo_title' => '行天宮',
                'seo_description' => '行天宮，或稱恩主公廟，位於臺灣臺北市中山區，又稱臺北關帝廟，主神為關聖帝君、呂恩主洞賓、張恩主單、王恩主善、岳恩主飛等五聖恩主，是臺灣知名的關帝廟，由經營煤礦事業有成的黃玄空道長所建設而成。本宮另有兩座分宮，位於臺北市北投區忠義山及新北市三峽區白雞山，稱「行天三宮」。',
                'status' => true,
            ],
        ];
    }

    private function createRelations(): void
    {
        $relations = [
            // 廟宇ID => 籤系統ID
            1 => [
                1 => ['sort' => 1, 'status' => true],
                2 => ['sort' => 2, 'status' => true],
            ],
        ];

        foreach ($relations as $templeId => $systems) {
            $temple = Temple::find($templeId);
            $temple->fortuneCategories()->sync($systems);
        }
    }
}
