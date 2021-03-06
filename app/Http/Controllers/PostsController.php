<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
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

        return view('posts.index', compact('posts'));
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
        if (auth()->user()->owner($post)) {
            return view('posts.destroyPostConfirm', compact('post'));
        }
        \Session::flash('flash_message', 'This is not your post!');
        return redirect()->back();
    }

    public function destroy(Post $post)
    {
        Comment::where('post_id', $post->id)->delete();
        if($post->delete()){
            return redirect('/');
        } else {
            \Session::flash('flash_message', 'Delete failed');
            return redirect()->back();
        }
    }

    public function edit(Post $post)
    {
        if (auth()->user()->owner(compact('post'))){
            return view('posts.editPost', compact('post'));
        }
        \Session::flash('flash_message', 'This is not your post!');
        return redirect()->back();
    }

    public function update(Post $post)
    {
        if (auth()->user()->owner(compact('post'))){
            if($post->title == $post->getOriginal('title')) {
                $this->validate(request(), [
                    'title' => 'bail|required|max:255',
                    'body' => 'required'
                ]);
            } else {
                $this->validate(request(), [
                    'title' => 'bail|required|unique:posts,title|max:255',
                    'body' => 'required'
                ]);
            }

            $post->fill(request()->all())->save();

            return redirect("/posts/{$post->id}");
        }
        \Session::flash('flash_message', 'This is not your post!');
        return redirect()->back();
    }
}
