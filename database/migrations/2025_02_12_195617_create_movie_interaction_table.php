<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('user_movie_interactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('movie_id'); // TMDB ID
            $table->boolean('is_liked')->default(false);
            $table->integer('rating')->nullable();
            $table->enum('type', ['movie', 'tv'])->default('movie');
            $table->timestamps();
            
            // Ensure unique combination of user, movie, and type
            $table->unique(['user_id', 'movie_id', 'type']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_movie_interactions');
    }
};
