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
        Schema::create('anime', function (Blueprint $table) {
            $table->id();
            $table->integer('mal_id')->unique()->index(); // MyAnimeList ID
            $table->string('title_original')->nullable(); // Оригинальное название
            $table->string('title_ukrainian'); // Украинское название
            $table->text('synopsis_original')->nullable(); // Оригинальное описание
            $table->text('synopsis_ukrainian')->nullable(); // Украинское описание
            $table->string('type')->nullable(); // TV, Movie, OVA, etc.
            $table->integer('episodes')->nullable();
            $table->string('status')->nullable(); // Airing, Finished, etc.
            $table->date('aired_from')->nullable();
            $table->date('aired_to')->nullable();
            $table->string('rating')->nullable(); // PG-13, R+, etc.
            $table->decimal('score', 3, 2)->nullable();
            $table->integer('scored_by')->nullable();
            $table->integer('rank')->nullable();
            $table->integer('popularity')->nullable();
            $table->integer('members')->nullable();
            $table->integer('favorites')->nullable();
            $table->string('image_url')->nullable();
            $table->text('genres')->nullable(); // JSON массив жанров
            $table->text('studios')->nullable(); // JSON массив студий
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anime');
    }
};
