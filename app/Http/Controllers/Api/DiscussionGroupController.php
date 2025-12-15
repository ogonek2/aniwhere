<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DiscussionGroup;
use App\Models\Sprite;
use Illuminate\Http\Request;

class DiscussionGroupController extends Controller
{
    /**
     * Get discussion groups for a sprite
     */
    public function index(Request $request, $spriteId)
    {
        $sprite = Sprite::findOrFail($spriteId);
        $groups = $sprite->discussionGroups()
            ->with(['discussions' => function($query) {
                $query->orderBy('created_at', 'desc')->limit(5);
            }])
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($groups);
    }

    /**
     * Get single discussion group
     */
    public function show($spriteId, $groupId)
    {
        $group = DiscussionGroup::where('sprite_id', $spriteId)
            ->with('discussions')
            ->findOrFail($groupId);

        return response()->json($group);
    }

    /**
     * Create new discussion group
     */
    public function store(Request $request, $spriteId)
    {
        $sprite = Sprite::findOrFail($spriteId);

        $validated = $request->validate([
            'title_ukrainian' => 'required|string|max:255',
            'description_ukrainian' => 'nullable|string',
        ]);

        $group = DiscussionGroup::create([
            'sprite_id' => $spriteId,
            'title_ukrainian' => $validated['title_ukrainian'],
            'description_ukrainian' => $validated['description_ukrainian'] ?? null,
            'created_by' => auth()->id(),
        ]);

        return response()->json($group, 201);
    }
}
