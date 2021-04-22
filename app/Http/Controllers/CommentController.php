<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateCommentRequest;
use App\Models\Post;

class CommentController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function store(Post $post, CreateCommentRequest $request) {
        $data = $request->validated();

        $comment = $post->comments()->create($data);
        info('novi komentar je: ');
        info($comment);

        return back();
    }
}
