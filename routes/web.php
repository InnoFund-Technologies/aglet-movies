<?php

use App\Http\Controllers\Admin\ContactAdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
 
Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/search', [SearchController::class, 'search']);

Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');

Route::get('/movies/{id}', [MovieController::class, 'showMovie'])->name('movies.show');

Route::get('/tv-shows', [MovieController::class, 'index'])->name('tv-shows.index');

Route::get('/tv-shows/{id}', [MovieController::class, 'showTvShow'])->name('tv-shows.show');

Route::get('/watchlist', [MovieController::class, 'index'])->name('watchlist');

Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');

Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

// Admin routes
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/contacts/{contact}', [ContactAdminController::class, 'show'])->name('admin.contacts.show');
});
