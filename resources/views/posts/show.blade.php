
@extends('layouts.app')

@section('content')


















    <div class="container">

            <div>

                    <!-- Post Content Column -->
                    <div class="col col-lg-8 col-xl-8">
                
                      <!-- Title -->
                      <h1 class="mt-4">{{$post->title}}</h1>
                
                      <!-- Author -->
                      <p class="lead">
                        by
                        <a href="#">{{$post->user->name}}</a>
                      </p>
                
                      <hr>

                      <!-- Date/Time -->
                      <p>Posted on {{ $post->created_at->format('j F, Y')}}</p>
                
                      <hr>
                
                      <!-- Preview Image -->
                    <img class="img-fluid img-cover rounded"  src="/storage/cover_images/{{$post->cover_image}}" alt="">
                
                      <hr>
                
                      <!-- Post Content -->

                      {!! $post->body !!}
                     
                      <hr>
                
                      
                       
                    </div>
                
                
                </div>
                
        <br><br><br>
        @can('update', $post)
            <a href="/posts/{{$post->id}}/edit" > Edit Post </a>
        @endcan

        <hr>

        <div class="my-3 p-3 bg-white rounded box-shadow " >
           <h6 class="border-bottom border-gray pb-2 mb-10">Coments</h6>

           @foreach ($post->comments as $comment)
            <div class="media text-muted pt-3">
                    <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                    <strong class="d-block text-gray-dark">{{$comment->user->username}}</strong>
                        {{$comment->comment}}
                    </p>
            </div>
           <br>
           @endforeach

           <form method="POST" action="/posts/{{$post->id}}/comment">
                @csrf
                @method('POST')
                <input type="text" class="form-control"  placeholder="Your Comment" name="comment"  required="" >
                <br>
                <button class="btn btn-sm btn-info float-right"> Add </button>
            </form>
        </div>
@endsection
