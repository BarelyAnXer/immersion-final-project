<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostsController;


Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', [PagesController::class, 'home']);
Route::get('/random', [PagesController::class, 'random']);
Route::get('/personal', [PagesController::class, 'personal']);




Route::resources(['posts' => PostsController::class]);



Auth::routes();
Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

