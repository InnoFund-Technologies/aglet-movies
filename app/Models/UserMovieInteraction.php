<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserMovieInteraction extends Model
{
    protected $fillable = [
        'user_id',
        'movie_id',
        'is_liked',
        'rating',
        'type' // 'movie' or 'tv'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}