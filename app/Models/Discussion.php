<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Discussion extends Model
{
    protected $fillable = [
        'discussion_group_id',
        'title_ukrainian',
        'content_ukrainian',
        'created_by',
        'replies_count',
        'last_reply_at',
    ];

    protected $casts = [
        'replies_count' => 'integer',
        'last_reply_at' => 'datetime',
    ];

    /**
     * Группа обсуждений
     */
    public function discussionGroup(): BelongsTo
    {
        return $this->belongsTo(DiscussionGroup::class);
    }

    /**
     * Создатель обсуждения
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
