<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DiscussionGroup extends Model
{
    protected $fillable = [
        'sprite_id',
        'title_ukrainian',
        'description_ukrainian',
        'created_by',
        'discussions_count',
    ];

    protected $casts = [
        'discussions_count' => 'integer',
    ];

    /**
     * Спрайт, к которому относится группа
     */
    public function sprite(): BelongsTo
    {
        return $this->belongsTo(Sprite::class);
    }

    /**
     * Обсуждения в группе
     */
    public function discussions(): HasMany
    {
        return $this->hasMany(Discussion::class);
    }

    /**
     * Создатель группы
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
