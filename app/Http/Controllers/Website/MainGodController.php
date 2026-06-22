<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Models
use App\Models\MainGod;

class MainGodController extends Controller
{
    public function index(Request $request, $name='guandi')
    {
        $MainGod = MainGod::with('signSystems')->where('slug', $name)->where('status', true)->first();
        // 避免變數亂代會沒資料，做個沒資料防呆讓View不會壞掉
        if (empty($MainGod)) {
            $MainGod = MainGod::with('signSystems')->where('status', true)->first();
        }
        // 建立詩籤類型關聯
        // $MainGod->signSystems()->sync([1 => ['sort'=>1, 'status' => true], 2 => ['sort'=>2, 'status' => true]]);
        // print_r($god);

        return view('vuejs.main-god.index_data', ['title' => '主神::', 'name' => $name, 'MainGod' => $MainGod]);
        return view('vuejs.main-god.index', ['title' => '主神::', 'name' => $name, 'MainGod' => $MainGod]);
    }
}
