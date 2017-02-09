<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    public function index()
    {
        $posts = Post::latest()
                    ->filter(request(['month', 'year']))
                    ->get();
        

        // temporary for now.
        $archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
                    ->groupBy('year', 'month')
                    ->orderByRaw('min(created_at) desc')
                    ->get()
                    ->toArray();

        return view('posts.index', compact('posts', 'archives'));
    }

    public function show(Post $post)
    { 
        return view('posts.show', compact('post'));
    }

    public function create()
    { 
        return view('posts.create');
    }

    /**
     * Store a new blog post.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store()
    {   
        // Validate
        $this->validate(request(), [
            'title' => 'bail|required|unique:posts,title|max:255',
            'body' => 'required'
        ]);

        auth()->user()->publish(
            new Post(request(['title', 'body']))
        );

        // redirect
        return redirect('/');
    }

    public function destroyConfirm(Post $post)
    {
        if (auth()->user()->id == $post->user_id) {
            return view('posts.destroyConfirm', compact('post'));
        }
        return redirect()->back()->withErrors(['This is not your post!']);
    }

    public function destroy(Post $post)
    {
        if($post->delete()){
            return redirect('/');
        } else {
            return redirect()->back()->withErrors(['Delete Failed']);
        }
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Post $post)
    {
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ]);

        $post->fill(request()->all())->save();

        return view('posts.show', compact('post'));
    }
}
