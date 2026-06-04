<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Models
use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // City::factory(50)->create();

        $cities = [
            [
                'id' => 1,
                'name' => 'Taipei City',
                'name_local' => '臺北市',
                'code' => 'TPE',
                'latitude' => 25.0330,
                'longitude' => 121.5654,
            ],
            [
                'id' => 2,
                'name' => 'New Taipei City',
                'name_local' => '新北市',
                'code' => 'NWT',
                'latitude' => 25.0120,
                'longitude' => 121.4657,
            ],
            [
                'id' => 3,
                'name' => 'Taoyuan City',
                'name_local' => '桃園市',
                'code' => 'TYC',
                'latitude' => 24.9936,
                'longitude' => 121.3010,
            ],
            [
                'id' => 4,
                'name' => 'Taichung City',
                'name_local' => '臺中市',
                'code' => 'TXG',
                'latitude' => 24.1477,
                'longitude' => 120.6736,
            ],
            [
                'id' => 5,
                'name' => 'Tainan City',
                'name_local' => '臺南市',
                'code' => 'TNN',
                'latitude' => 22.9997,
                'longitude' => 120.2270,
            ],
            [
                'id' => 6,
                'name' => 'Kaohsiung City',
                'name_local' => '高雄市',
                'code' => 'KHH',
                'latitude' => 22.6273,
                'longitude' => 120.3014,
            ],
            [
                'id' => 7,
                'name' => 'Keelung City',
                'name_local' => '基隆市',
                'code' => 'KEE',
                'latitude' => 25.1276,
                'longitude' => 121.7392,
            ],
            [
                'id' => 8,
                'name' => 'Hsinchu City',
                'name_local' => '新竹市',
                'code' => 'HSZ',
                'latitude' => 24.8138,
                'longitude' => 120.9675,
            ],
            [
                'id' => 9,
                'name' => 'Chiayi City',
                'name_local' => '嘉義市',
                'code' => 'CYI',
                'latitude' => 23.4801,
                'longitude' => 120.4491,
            ],
            [
                'id' => 10,
                'name' => 'Hsinchu County',
                'name_local' => '新竹縣',
                'code' => 'HSQ',
                'latitude' => 24.8387,
                'longitude' => 121.0177,
            ],
            [
                'id' => 11,
                'name' => 'Miaoli County',
                'name_local' => '苗栗縣',
                'code' => 'MIA',
                'latitude' => 24.5602,
                'longitude' => 120.8214,
            ],
            [
                'id' => 12,
                'name' => 'Changhua County',
                'name_local' => '彰化縣',
                'code' => 'CHA',
                'latitude' => 24.0800,
                'longitude' => 120.5388,
            ],
            [
                'id' => 13,
                'name' => 'Nantou County',
                'name_local' => '南投縣',
                'code' => 'NAN',
                'latitude' => 23.9609,
                'longitude' => 120.9719,
            ],
            [
                'id' => 14,
                'name' => 'Yunlin County',
                'name_local' => '雲林縣',
                'code' => 'YUN',
                'latitude' => 23.7092,
                'longitude' => 120.4313,
            ],
            [
                'id' => 15,
                'name' => 'Chiayi County',
                'name_local' => '嘉義縣',
                'code' => 'CYQ',
                'latitude' => 23.4518,
                'longitude' => 120.2550,
            ],
            [
                'id' => 16,
                'name' => 'Pingtung County',
                'name_local' => '屏東縣',
                'code' => 'PIF',
                'latitude' => 22.5519,
                'longitude' => 120.5488,
            ],
            [
                'id' => 17,
                'name' => 'Yilan County',
                'name_local' => '宜蘭縣',
                'code' => 'ILA',
                'latitude' => 24.7021,
                'longitude' => 121.7378,
            ],
            [
                'id' => 18,
                'name' => 'Hualien County',
                'name_local' => '花蓮縣',
                'code' => 'HUA',
                'latitude' => 23.9872,
                'longitude' => 121.6015,
            ],
            [
                'id' => 19,
                'name' => 'Taitung County',
                'name_local' => '臺東縣',
                'code' => 'TTT',
                'latitude' => 22.7583,
                'longitude' => 121.1444,
            ],
            [
                'id' => 20,
                'name' => 'Penghu County',
                'name_local' => '澎湖縣',
                'code' => 'PEN',
                'latitude' => 23.5712,
                'longitude' => 119.5793,
            ],
            [
                'id' => 21,
                'name' => 'Kinmen County',
                'name_local' => '金門縣',
                'code' => 'KIN',
                'latitude' => 24.4321,
                'longitude' => 118.3171,
            ],
            [
                'id' => 22,
                'name' => 'Lienchiang County',
                'name_local' => '連江縣',
                'code' => 'LIE',
                'latitude' => 26.1602,
                'longitude' => 119.9517,
            ],
        ];

        foreach ($cities as $key=>$city) {
            City::factory()->create([
                'id' => $city['id'],
                'country_id' => 1,
                'name' => $city['name'],
                'name_local' => $city['name_local'],
                'slug' => $city['code'],
                'latitude' => $city['latitude'],
                'longitude' => $city['longitude'],
                'status' => true,
            ]);
        }
    }
}
