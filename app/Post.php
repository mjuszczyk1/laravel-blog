<?php

namespace App;

use Carbon\Carbon;

class Post extends Model
{   
    /**
     * This sets the relationship.
     * For example, let's say in tinker, we have a post set up like...
     *      $p = App\Post::find($id);
     * You can now find its comments by doing
     *      $p->comments;
     * Because Eloquent will take care of everything. Check out the 
     * Comment model to see the relation ship set up over there.
     */
	public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * This is a helper function for the Comments controller class.
     * It's just a more semantic way of writing exactly what we want 
     * to do. We want to "add a comment to a post" - hence the
     * function name (addComment), and therefore the underlying 
     * structure to add a comment:
     *      $post->addComment($body);
     * Nifty.
     */
    public function addComment($body)
    {
        $this->comments()->create(compact('body'));
        // This automatically sets comment ID because of the relationship
        // we set up.
    }

    public function scopeFilter($query, $filters)
    {
        if ($month = $filters['month']) {
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if ($year = $filters['year']) {
            $query->whereYear('created_at', $year);
        }
    }
}
