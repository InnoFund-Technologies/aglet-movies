<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Route;
use App\Http\Controllers\MovieController;

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('/watchlist/{movie}', [MovieActionController::class, 'toggleWatchlist']);
    Route::delete('/watchlist/{movie}', [MovieActionController::class, 'toggleWatchlist']);
    
    Route::post('/like/{movie}', [MovieActionController::class, 'toggleLike']);
    Route::delete('/like/{movie}', [MovieActionController::class, 'toggleLike']);
    
    Route::post('/rate/{movie}', [MovieActionController::class, 'rate']);
});