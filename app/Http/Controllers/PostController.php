<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PostController extends Controller
{
    public function index(Request $request) {
        $posts = Post::published()->with('comments', 'tags')->paginate($request->query('perPage', 8));
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post) {
        if(!$post->is_published) {
           throw new ModelNotFoundException();
        }

        $post->load(['comments', 'tags', 'author', 'author.posts']);
        return view('posts.show', compact('post'));
    }

    public function create() {
        return view('posts.create');
    }

    public function store(CreatePostRequest $request) {

       $data = $request->validated();
       $newPost = auth()->user()->posts()->create($data);

        return redirect('/posts');
    }
}
