<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/blog/[id]', function (Request $request) {
    return 'ini adalah blog'.$request->id;
});

Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/add', [BlogController::class, 'add']);
Route::post('/blog/create', [BlogController::class, 'create']);
