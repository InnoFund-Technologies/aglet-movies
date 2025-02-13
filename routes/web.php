<?php

use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\FavouritesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MovieController::class, 'index'])->name('home');

Route::get('/contact', [ContactUsController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactUsController::class, 'store'])->name('contact.store');

Route::get('/favourites/{id}', [MovieController::class, 'showMovie'])->name('favourites.show');

Route::get('/favourites', [FavouritesController::class, 'index'])->name('favourites.index');

Route::post('/favourites', [FavouritesController::class, 'addToFavourites'])->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
