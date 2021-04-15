<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PostController extends Controller
{
    public function index() {
        $posts = Post::published()->get();
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post) {
        if(!$post->is_published) {
           throw new ModelNotFoundException();
        }
        return view('posts.show', compact('post'));
    }
}
