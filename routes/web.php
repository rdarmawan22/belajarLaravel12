<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/blog', [BlogController::class, 'index']);

Route::get('/blog/[id]', function (Request $request) {
    return 'ini adalah blog'.$request->id;
});

