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

        return view('vuejs.fortune.list', ['Title' => '籤詩集', 'categories' => $sign]);
    }

    public function Info(Request $request, $no='1')
    {
        $fortune = Fortune::with('signsystem')->find($no);

        return view('vuejs.fortune.info', ['Title' => sprintf('%s | 籤詩', $fortune->title), 'fortune' => $fortune]);
    }
}
