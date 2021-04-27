<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function show(Tag $tag) {
        $tag->load(['posts' => function($db) {
            return $db->where('is_published', 1);
        }]);

        return view('tags.show', compact('tag'));
    }
}
