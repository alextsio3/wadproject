<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class CommentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

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

    public function update(Request $request, Comment $comment)
    {

        $this->authorize('update', $comment );

        $data = $request->validate([
            'body' => 'required|string'
        ]);
        $comment->body = $data['body'];

        $comment->save();

        return response($comment, 200);
    }

    public function destroy($comment_id)
    {
        $comment = Comment::find($comment_id);
        $this->authorize('destroy', $comment );
        $comment->delete();
        return response( null,204);
    }
}

