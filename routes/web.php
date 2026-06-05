<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
    // return view('vuejs.layouts.app');
    return view('vuejs.pages.home');
});
