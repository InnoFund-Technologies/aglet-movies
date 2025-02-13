<?php

use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/contact', [ContactUsController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactUsController::class, 'store'])->name('contact.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');

Route::get('/movies/{id}', [MovieController::class, 'showMovie'])->name('movies.show');

Route::get('/tv-shows', [MovieController::class, 'index'])->name('tv-shows.index');

Route::get('/tv-shows/{id}', [MovieController::class, 'showTvShow'])->name('tv-shows.show');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
