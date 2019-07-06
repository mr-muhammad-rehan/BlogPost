

@extends('layouts.app')

@section('content')
<div class="container">

    <a href="/posts/create">Create A Post</a>
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="post-preview">

        @foreach ($posts as $post)
         <div class="post-preview">
            <a href="/posts/{{$post->id}}">
              <h2 class="post-title">
                {{$post->title}}
              </h2>
              <h3 class="post-subtitle">
                @if (empty($post->excerpt))
                  {{ str_limit($post->body, $limit = 50, $end = '...') }}

                  @else

                   {{$post->excerpt}}

                @endif
              </h3>
            </a>
            <p class="post-meta">Posted by
             <a href="/posts/{{$post->id}}"> {{$post->user->name}} </a>
              on July 8, 2019</p>
          </div>
          <hr>
        @endforeach
      </div>
    </div>
  </div>
@endsection

