<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Discussion;
use App\Models\DiscussionGroup;
use Illuminate\Http\Request;

class DiscussionController extends Controller
{
    /**
     * Get discussions for a discussion group
     */
    public function index(Request $request, $groupId)
    {
        $group = DiscussionGroup::findOrFail($groupId);
        $discussions = $group->discussions()
            ->with('creator')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return response()->json($discussions);
    }

    /**
     * Get single discussion
     */
    public function show($groupId, $discussionId)
    {
        $discussion = Discussion::where('discussion_group_id', $groupId)
            ->with('creator')
            ->findOrFail($discussionId);

        return response()->json($discussion);
    }

    /**
     * Create new discussion
     */
    public function store(Request $request, $groupId)
    {
        $group = DiscussionGroup::findOrFail($groupId);

        $validated = $request->validate([
            'title_ukrainian' => 'required|string|max:255',
            'content_ukrainian' => 'required|string',
        ]);

        $discussion = Discussion::create([
            'discussion_group_id' => $groupId,
            'title_ukrainian' => $validated['title_ukrainian'],
            'content_ukrainian' => $validated['content_ukrainian'],
            'created_by' => auth()->id(),
        ]);

        // Обновляем счетчик обсуждений в группе
        $group->increment('discussions_count');
        $group->update(['last_reply_at' => now()]);

        return response()->json($discussion->load('creator'), 201);
    }
}
