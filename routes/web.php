<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Website\MainGodController;

Route::get('/', function () {
    // return view('welcome');
});

Route::get('/', function () {
    return view('vuejs.pages.demo');
});

Route::get('/home', function () {
    return view('vuejs.pages.home', ['name' => 'guandi']);
});

Route::prefix('/main-god')->name('main-god.')->group(function () {
    Route::get('/{name?}', [MainGodController::class, 'show'])->name('show');
    // Route::get('/{name}', function (?string $name = 'guandi') {
    //     return view('vuejs.pages.home', ['name' => $name]);
    // });
});