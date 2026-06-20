<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LuckyNumberController extends Controller
{
    // 大樂透模式
    public function From49Choose6(Request $request)
    {
        return view('vuejs.lucky-number.from49choose6', ['title' => '幸運號碼::大樂透']);
    }

    // 威力彩模式
    public function From38_8Choose6_1(Request $request)
    {
        return view('vuejs.lucky-number.from38_8choose6_1', ['title' => '幸運號碼::威力彩']);
    }
}
