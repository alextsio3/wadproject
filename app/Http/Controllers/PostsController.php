<?php
namespace App\Http\Controllers;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = auth()->user()->links()->pluck('profiles.user_id');
        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(7);

        return view('posts.index', compact('posts'));
    }
    public function create()
    {
        return view('posts.create');
    }
    public function store(Request $request)
    {
        $data = request()->validate([
            'title' => 'string | required',
            'caption' => 'required',
            'image' => [ 'image'],
        ]);
        if (request('image')){
            $imagePath = request('image')->store('uploads', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
            $image->save();
            $imageArray =  ['image' => $imagePath ];

        }
            auth()->user()->posts()->create(array_merge(
            $data,
            $imageArray ?? []
            ));
        return redirect('/profile/' . auth()->user()->id);


    }
    public function show(Post $post)
    {
            $ids = Session::get('ids') ? Session::get('ids') : [];
            if (!in_array($post->id, $ids)) {
                $post->increment('views');
                $ids[] = $post->id;
                Session::put('ids', $ids);
            }

        return view('posts.show', compact('post'));
    }


    public function Delete(Post $post)
    {
        $this->authorize('update', $post );
        $post->delete();
        return redirect('/profile/' . auth()->user()->id);
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post );
        return view('posts.edit', compact('post'));

    }


    public function Display ()
    {
        $posts = Post::paginate(2);
        return view('posts.PostsDisplay', compact('posts'));
    }

    public function update(Post $post)
    {

        $this->authorize('update', $post );
        $data = request()->validate([
            'title' => 'string | required',
            'caption' => 'required',
            'image' => 'nullable|image',
        ]);

        if (request('image')){
            $imagePath = request('image')->store('uploads', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
            $image->save();

            $imageArray =  ['image' => $imagePath ];
        }
        auth()->user()->posts()->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect('/profile/' . auth()->user()->id);



    }


}
