<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('owner_id', auth()->id())->get();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        if (auth()->authenticate()) {
         return view('posts.create');
        }

        //return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedPost = $request->validate([
            'title' => 'required|min:4|max:255',
            'body' => 'required|min:6',
            'excerpt' => 'max:255',
            'cover_image' => 'image|nullable|max:1999'
        ]);

       $fileNameToStore=coverImage($request);

        $validatedPost['owner_id'] = auth()->id();
        $validatedPost['cover_image'] = $fileNameToStore;

        Post::create( $validatedPost );

        return redirect('/posts');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validatedPost = $request->validate([
            'title' => 'required|min:4|max:255',
            'body' => 'required|min:6',
            'excerpt' => 'max:255'
        ]);

        $post->update($validatedPost);

        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
       $post->delete();
       return redirect('/posts');
    }


    public function coverImage($request)
    {
        if($request->hasFile('cover_image')){
            //Get Filename with extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get Extention
            $extention = $request->file('cover_image')->getClientOriginalExtension();
            //FileName To store
            $fileNameToStore = $filename.'_'.time().'.'.$extention;
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        
        return $fileNameToStore;
    }
}
