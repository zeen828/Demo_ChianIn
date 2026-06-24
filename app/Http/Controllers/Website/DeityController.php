<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Models
use App\Models\Deity;

class DeityController extends Controller
{
    public function index(Request $request, $name='guandi')
    {
        $Deity = Deity::where('slug', $name)->where('status', true)->first();
        // $MainGod = MainGod::with('fortuneCategory')->where('slug', $name)->where('status', true)->first();
        // 避免變數亂代會沒資料，做個沒資料防呆讓View不會壞掉
        if (empty($Deity)) {
            $Deity = Deity::where('status', true)->first();
            // $Deity = Deity::with('fortuneCategory')->where('status', true)->first();
        }

        return view('vuejs.deity.index', ['Title' => sprintf('%s | 線上抽籤', $Deity->name), 'Deity' => $Deity]);
    }
}
