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

    /**
     * Check to see if user is owner of piece of content.
     * Haven't tried, but seems like it should work if it was passed both a post and comment.
     *
     * @param $contentTypes     array
     *                          key is the content type, value is the piece of content.
     *                          or, ya know, you could use compact()    ;) <- winky face
     */
    public function owner($contentTypes)
    {
        // dd($contentTypes);
        if (!empty($contentTypes['post'])){
            if(auth()->user()->id == $contentTypes['post']->attributes['user_id']){
                return true;
            }
        }
        if (!empty($contentTypes['comment']) && auth()->user()->id == $contentTypes['comment']->user_id) {
            return true;
        }
        
        return false; 
    }
}
