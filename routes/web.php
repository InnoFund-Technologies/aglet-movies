<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\SearchController;
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

Route::get('/search', [SearchController::class, 'search']);

Route::get('/movies', [MovieController::class, 'movies'])->name('movies');

Route::get('/watchlist', [MovieController::class, 'movies'])->name('watchlist');

Route::get('/tv-shows', [MovieController::class, 'movies'])->name('tv-shows');

Route::get('/movies/{id}', [MovieController::class, 'show'])->name('show');