<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\User;


class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin()

    {
        $data['users'] = User::orderBy('id','asc')->paginate(8);

        return view('admin',$data);
    }

    public function adminposts()

    {

        $posts['posts'] = Post::orderBy('id','asc')->paginate(8);
        return view('admin.adminPosts',$posts);
    }

    public function admincomments()

    {
        $comments['comments'] = Comment::orderBy('id','asc')->paginate(8);

        return view('admin.adminComments',$comments);
    }

    public function destroyUser($id)
    {
        User::where('id',$id)->delete();

    }

    public function destroyPost($id)
    {
        Post::where('id',$id)->delete();

    }

    public function destroyComment($id)
    {
        Comment::where('id',$id)->delete();

    }
}
