<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Middleware;

class Post extends Model
{
    protected $fillable = [
        'title',
        'body',
        'excerpt',
        'owner_id',
        'cover_image',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'owner_id');
    }

    public function addComment($comment)
    {
        return Comment::create([
            'user_id' => auth()->id(),
            'post_id' => $this->id,
            'comment' => $comment['comment'],
        ]);
    }

  
}
