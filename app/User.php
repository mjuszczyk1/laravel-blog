<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'name_slug', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function publish(Post $post)
    {
        $this->posts()->save($post);
        // Because we set the relationship, this will
        // automatically grab the user ID
    }

    public function addComment(Comment $comment)
    {
        $this->comments()->save($comment);
    }

    public function owner(Post $post=null, Comment $comment=null)
    {
        if ($comment && auth()->user()->id == $comment->user_id){
            return true;
        } elseif ($post && auth()->user()->id == $post->user_id) {
            return true;
        }
        return false; 
    }
}
