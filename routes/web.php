<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;

Route::resource('posts', PostController::class);
Route::resource('articles', ArticleController::class);
Route::resource('categories', CategoryController::class);

Route::get('/', function () {
    return view('welcome');
});
