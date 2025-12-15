<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sprite;
use Illuminate\Http\Request;

class SpriteController extends Controller
{
    /**
     * Get list of sprites
     */
    public function index(Request $request)
    {
        $limit = $request->get('limit', 20);
        $sprites = Sprite::with(['anime', 'discussionGroups'])
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();

        return response()->json($sprites);
    }

    /**
     * Get single sprite by ID
     */
    public function show($id)
    {
        $sprite = Sprite::with(['anime', 'discussionGroups.discussions'])
            ->findOrFail($id);
        
        return response()->json($sprite);
    }

    /**
     * Create new sprite
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title_ukrainian' => 'required|string|max:255',
            'description_ukrainian' => 'nullable|string',
            'image_url' => 'nullable|url',
            'anime_ids' => 'required|array',
            'anime_ids.*' => 'exists:anime,id',
        ]);

        $sprite = Sprite::create([
            'title_ukrainian' => $validated['title_ukrainian'],
            'description_ukrainian' => $validated['description_ukrainian'] ?? null,
            'image_url' => $validated['image_url'] ?? null,
            'created_by' => auth()->id(),
        ]);

        $sprite->anime()->attach($validated['anime_ids']);

        return response()->json($sprite->load('anime'), 201);
    }
}
