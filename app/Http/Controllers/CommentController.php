<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index(Post $post)
    {
        return response()->json($post->comments()->with('user')->latest()->get());
    }

    public function store(Request $request, Post $post)
    {
        $comment = $post->comments()->create([
            'body' => $request->body,
            'user_id' => Auth::id()
        ]);

        $comment = Comment::where('id', $comment->id)->with('user')->first();
        return $comment->toJson();
    }

    public function show(Comment $comment)
    {

        return view('comments.commentsDisplay', compact('comment'));
    }

    public function Delete($comment_id)
    {
        $comment = Comment::where('id', $comment_id)->first();
        $this->authorize('Delete', $comment );
        $comment->delete();
        return back();
    }

}
