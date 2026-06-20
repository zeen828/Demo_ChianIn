<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainGodController extends Controller
{
    public function index(Request $request, $name='guandi')
    {
        return view('vuejs.main-god.index', ['title' => '主神::', 'name' => $name]);
    }
}
