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
        Schema::create('anime_sprite', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sprite_id')->constrained('sprites')->cascadeOnDelete();
            $table->foreignId('anime_id')->constrained('anime')->cascadeOnDelete();
            $table->timestamps();
            
            $table->unique(['sprite_id', 'anime_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anime_sprite');
    }
};
