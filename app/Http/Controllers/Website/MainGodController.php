<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainGodController extends Controller
{
    public function show(Request $request, $name='guandi')
    {
        return view('vuejs.pages.home', ['name' => $name]);
    }
}
