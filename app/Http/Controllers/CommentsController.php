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
        // To get user id:
        // auth()->user()->id;
        $this->validate(request(), [
            'body' => 'required|min:4'
        ]);
        $post->addComment(request('body'));
        return back();
    }

    public function edit(Comment $comment)
    {
        // this will probably need to be put in a different method name
        // for sanity sake. This won't work though, because bcrypt always
        // returns something different, so we can't send one, then compare
        // that to a newly generated one.
        if ($comment->user_id === auth()->user()->id) {
            $test = bcrypt(auth()->user()->name);
            return $test;
            // dd(Hash::make(auth()->user()->name));
            // Below works:
            // $secret_string = 'lzidx7fg(*&3.kvj849&.kj34';
            // return $secret_string;
        } else {
            return redirect()->back();
        }
    }
}
