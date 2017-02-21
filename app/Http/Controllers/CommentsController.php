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
        if (auth()->user()->owner(compact('comment'))) {
            return view('posts.editComment', compact('comment'));
        }
        \Session::flash('flash_message', 'This is not your comment!');
        return redirect()->back();
    }

    public function update(Comment $comment)
    {
        if (auth()->user()->owner(compact('comment'))){
            $this->validate(request(), [
                'body' => 'required|min:4'
            ]);
            $comment->fill(request(['body']))->save();
        } else {
            \Session::flash('flash_message', 'This is not your comment!');
        }
        return redirect("/posts/$comment->post_id}");
    }

    public function destroyConfirm(Comment $comment)
    {
        if (auth()->user()->owner(compact('comment'))){
            return view('posts.destroyCommentConfirm', compact('comment'));
        }
        \Session::flash('flash_message', 'This is not your comment!');
        return redirect("/posts/$comment->post_id");
    }

    public function destroy(Comment $comment)
    {
        if (auth()->user()->owner(compact('comment'))){
            $redirect = $comment->post_id;
            if ($comment->delete()){
                return redirect("/posts/$redirect");
            } else {
                \Session::flash('flash_message', 'Delete failed');
                return redirect("/posts/$redirect");
            }
        } else {
            \Session::flash('flash_message', 'This is not your comment!');
            return redirect("/posts/$redirect");
        }
    }
}
