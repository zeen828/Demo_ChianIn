<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function WebSocket(Request $request)
    {
        return view('vuejs.tests.websocket');
    }
}
