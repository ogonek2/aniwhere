<?php

namespace App\Http\Controllers;

use App\Models\Sprite;
use Illuminate\Http\Request;

class SpriteController extends Controller
{
    public function show($id)
    {
        $sprite = Sprite::with(['anime', 'discussionGroups.discussions'])
            ->findOrFail($id);
        
        return view('sprite.show', ['spriteId' => $id, 'sprite' => $sprite]);
    }
}
