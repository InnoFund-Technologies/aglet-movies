<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMovieInteraction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'movie_id',
        'type', // 'movie' or 'tv'
        'is_liked',
        'rating',
        'in_watchlist',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_liked' => 'boolean',
        'in_watchlist' => 'boolean',
        'rating' => 'integer',
    ];

    /**
     * Get the user associated with the interaction.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}