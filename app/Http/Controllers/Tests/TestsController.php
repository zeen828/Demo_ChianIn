<?php

namespace App\Http\Controllers\Tests;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestsController extends Controller
{
    public function WebSocket(Request $request)
    {
        return view('vuejs.tests.websocket');
    }
}
