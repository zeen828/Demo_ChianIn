<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Test\TestController;
use App\Http\Controllers\Website\DeityController;
use App\Http\Controllers\Website\FortuneController;
use App\Http\Controllers\Website\LuckyNumberController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    $title = '首頁DEMO';
    return view('vuejs.pages.demo', ['Title' => $title]);
})->name('index');

// 測試區域
Route::prefix('tests')->name('tests.')->group(function () {
    Route::get('websocket', [TestController::class, 'WebSocket'])->name('websocket');
});

// 神明
Route::prefix('deity')->name('deity.')->group(function () {
    Route::get('{name?}', [DeityController::class, 'index'])->name('index');
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
