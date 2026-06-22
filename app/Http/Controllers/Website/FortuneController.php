<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Model
use App\Models\SignSystem;
use App\Models\Fortune;

class FortuneController extends Controller
{
    public function List(Request $request)
    {
        $sign = SignSystem::with('fortunes')->get();
        // print_r($sign);exit();

        return view('vuejs.fortune.list', ['categories' => $sign]);
    }

    public function Info(Request $request, $no='1')
    {
        $fortune = Fortune::find($no);
        return view('vuejs.fortune.info', ['title' => '主神::', 'name' => 'test', 'fortune' => $fortune]);
    }
}
