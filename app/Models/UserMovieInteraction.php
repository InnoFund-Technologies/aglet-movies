<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserMovieInteraction extends Migration
{
    public function up()
    {
        Schema::create('user_movie_interactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('movie_id');
            $table->boolean('in_watchlist')->default(false);
            $table->boolean('is_liked')->default(false);
            $table->integer('rating')->nullable();
            $table->timestamps();
            
            $table->unique(['user_id', 'movie_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_movie_interactions');
    }
};