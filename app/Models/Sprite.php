<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sprite extends Model
{
    protected $fillable = [
        'title_ukrainian',
        'description_ukrainian',
        'image_url',
        'created_by',
    ];

    /**
     * Аниме, привязанные к спрайту
     */
    public function anime(): BelongsToMany
    {
        return $this->belongsToMany(Anime::class, 'anime_sprite');
    }

    /**
     * Группы обсуждений спрайта
     */
    public function discussionGroups(): HasMany
    {
        return $this->hasMany(DiscussionGroup::class);
    }

    /**
     * Создатель спрайта
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
