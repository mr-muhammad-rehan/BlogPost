<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 
        'body',
        'excerpt',
        'owner_id'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function addComment($comment)
    {
        return Comment::create([
            'post_id' => $this->id,
            'comment' => $comment['comment'],
        ]);
    }
}