<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpriteController;
use App\Http\Controllers\Api\AnimeController;
use App\Http\Controllers\Api\SpriteController as ApiSpriteController;
use App\Http\Controllers\Api\DiscussionGroupController;
use App\Http\Controllers\Api\DiscussionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sprite/{id}', [SpriteController::class, 'show'])->name('sprite.show');

// API Routes
Route::prefix('api')->group(function () {
    // Anime
    Route::get('/anime', [AnimeController::class, 'index']);
    Route::get('/anime/{id}', [AnimeController::class, 'show']);
    Route::get('/anime/top/{limit?}', [AnimeController::class, 'top']);
    
    // Sprites
    Route::get('/sprites', [ApiSpriteController::class, 'index']);
    Route::get('/sprites/{id}', [ApiSpriteController::class, 'show']);
    Route::post('/sprites', [ApiSpriteController::class, 'store']);
    
    // Discussion Groups
    Route::get('/sprites/{spriteId}/discussion-groups', [DiscussionGroupController::class, 'index']);
    Route::get('/sprites/{spriteId}/discussion-groups/{groupId}', [DiscussionGroupController::class, 'show']);
    Route::post('/sprites/{spriteId}/discussion-groups', [DiscussionGroupController::class, 'store']);
    
    // Discussions
    Route::get('/discussion-groups/{groupId}/discussions', [DiscussionController::class, 'index']);
    Route::get('/discussion-groups/{groupId}/discussions/{discussionId}', [DiscussionController::class, 'show']);
    Route::post('/discussion-groups/{groupId}/discussions', [DiscussionController::class, 'store']);
});
