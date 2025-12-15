<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Anime extends Model
{
    protected $table = 'anime';

    protected $fillable = [
        'mal_id',
        'title_original',
        'title_ukrainian',
        'synopsis_original',
        'synopsis_ukrainian',
        'type',
        'episodes',
        'status',
        'aired_from',
        'aired_to',
        'rating',
        'score',
        'scored_by',
        'rank',
        'popularity',
        'members',
        'favorites',
        'image_url',
        'genres',
        'studios',
    ];

    protected $casts = [
        'genres' => 'array',
        'studios' => 'array',
        'aired_from' => 'date',
        'aired_to' => 'date',
        'score' => 'decimal:2',
    ];

    /**
     * Спрайты, к которым привязано аниме
     */
    public function sprites(): BelongsToMany
    {
        return $this->belongsToMany(Sprite::class, 'anime_sprite');
    }
}
