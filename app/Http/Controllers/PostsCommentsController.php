<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsCommentsController extends Controller
{
    public function store(Post $post)
    {
        $validatedCOmment =  request()->validate([
            'comment'=>'required|min:1',
         ]);
         $post->addComment( $validatedCOmment );

       return back();
    }
}
