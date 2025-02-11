<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');
 
Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');

Route::get('/movies/{id}', [MovieController::class, 'show'])->name('movies.show');

Route::get('/movies/search', [MovieController::class, 'search'])->name('movies.search');