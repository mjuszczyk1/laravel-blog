<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function index()
    { 
        return view('posts.index');
    }

    public function show()
    { 
        return view('posts.show');
    }

    public function create()
    { 
        return view('posts.create');
    }

    public function store()
    {
        // Validate
        $this->validate(request(), [
            'postTitle' => 'required',
            'postBody' => 'required'
        ]);

        // create new post using request data
        // save to db
        Post::create([
            'title' => request('postTitle'),
            'body' => request('postBody')
        ]);

        // redirect
        return redirect('/');
    }

}
