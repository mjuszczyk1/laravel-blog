<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;

class CommentsController extends Controller
{
    /**
     * Add comment to post.
     *
     * @param  Post     $post
     * @return Response
     */
    public function store(Post $post)
    {
        $this->validate(request(), [
            'body' => 'required|min:4'
        ]);
        $post->addComment(request('body'));
        return back();
    }
}
