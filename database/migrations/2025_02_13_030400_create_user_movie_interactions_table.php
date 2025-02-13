<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_movie_interactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Reference to users table
            $table->string('movie_id'); // TMDB movie or TV show ID
            $table->enum('type', ['movie', 'tv']); // Type of media (movie or TV show)
            $table->boolean('is_liked')->default(false); // Whether the user liked the media
            $table->integer('rating')->nullable(); // User rating (1-5 stars)
            $table->boolean('in_watchlist')->default(false); // Whether the media is in the user's watchlist
            $table->timestamps(); // created_at and updated_at

            // Ensure each user can only have one interaction per movie/TV show
            $table->unique(['user_id', 'movie_id', 'type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_movie_interactions');
    }
};