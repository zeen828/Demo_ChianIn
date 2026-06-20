<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Test\TestController;
use App\Http\Controllers\Website\MainGodController;
use App\Http\Controllers\Website\FortuneController;
use App\Http\Controllers\Website\LuckyNumberController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('vuejs.pages.demo');
})->name('index');

// 測試區域
Route::prefix('tests')->name('tests.')->group(function () {
    Route::get('websocket', [TestController::class, 'WebSocket'])->name('websocket');
});

// 主神
Route::prefix('main-god')->name('main-god.')->group(function () {
    Route::get('{name?}', [MainGodController::class, 'index'])->name('index');
    // Route::get('/{name}', function (?string $name = 'guandi') {
    //     return view('vuejs.pages.home', ['name' => $name]);
    // });
});

// 籤詩全集
Route::prefix('fortune')->name('fortune.')->group(function () {
    Route::get('list', [FortuneController::class, 'List'])->name('list');
    Route::get('{no}/info', [FortuneController::class, 'Info'])->name('info');
});

// 幸運號碼
Route::prefix('lucky-number')->name('lucky-number.')->group(function () {
    Route::get('49-6', [LuckyNumberController::class, 'From49Choose6'])->name('49-6');
    Route::get('38-6-8-1', [LuckyNumberController::class, 'From38_8Choose6_1'])->name('38-6-8-1');
});
