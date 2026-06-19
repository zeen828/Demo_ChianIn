<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Tests\TestsController;
use App\Http\Controllers\Website\MainGodController;

Route::get('/', function () {
    // return view('welcome');
});

Route::get('/', function () {
    return view('vuejs.pages.demo');
});

Route::get('home', function () {
    return view('vuejs.pages.home', ['name' => 'guandi']);
});

Route::prefix('tests')->name('tests.')->group(function () {
    Route::get('websocket', [TestsController::class, 'WebSocket'])->name('websocket');
});

Route::prefix('main-god')->name('main-god.')->group(function () {
    Route::get('{name?}', [MainGodController::class, 'index'])->name('index');
    // Route::get('/{name}', function (?string $name = 'guandi') {
    //     return view('vuejs.pages.home', ['name' => $name]);
    // });
});
