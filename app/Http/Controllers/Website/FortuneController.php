<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FortuneController extends Controller
{
    public function List(Request $request)
    {
        return view('vuejs.fortune.list', ['title' => '主神::', 'name' => 'test']);
    }

    public function Info(Request $request, $no='1')
    {
        return view('vuejs.fortune.info', ['title' => '主神::', 'name' => 'test']);
    }
}
