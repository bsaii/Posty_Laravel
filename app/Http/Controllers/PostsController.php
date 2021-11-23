<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    //middleware
    public function __construct()
    {
        $this->middleware(['auth'])->only(['store', 'destroy']);
    }

    public function index()
    {
        // geting all the posts from the database
        // $posts = Post::get();

        // pagination and eager loading - with
        $posts = Post::orderBy('created_at', 'desc')->with(['user', 'likes'])->paginate(10);

        return view('posts.index', ['posts' => $posts]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);

        //using the relationship to create data
        $request->user()->posts()->create($request->only('body'));

        return back();
    }

    public function destroy(Post $post)
    {
        // using laravel policy to authorize delete
        $this->authorize('delete', $post);

        $post->delete();

        return back();
    }
}
