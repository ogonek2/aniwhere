<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Anime;
use Illuminate\Http\Request;

class AnimeController extends Controller
{
    /**
     * Get list of anime
     */
    public function index(Request $request)
    {
        $limit = $request->get('limit', 20);
        $anime = Anime::orderBy('rank', 'asc')
            ->limit($limit)
            ->get();

        return response()->json($anime);
    }

    /**
     * Get single anime by ID
     */
    public function show($id)
    {
        $anime = Anime::findOrFail($id);
        return response()->json($anime);
    }

    /**
     * Get top anime
     */
    public function top($limit = 100)
    {
        $anime = Anime::orderBy('rank', 'asc')
            ->whereNotNull('rank')
            ->limit($limit)
            ->get();

        return response()->json($anime);
    }
}
