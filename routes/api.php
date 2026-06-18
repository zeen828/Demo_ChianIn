<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// Controller
use App\Http\Controllers\Api\FortuneController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// routes/api.php
Route::get('/test', [FortuneController::class, 'index']);
Route::get('/fortune-systems', [FortuneController::class, 'systems']);
Route::post('/draw-lot', [FortuneController::class, 'drawLot']);