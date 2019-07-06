
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
            <h2 class="section-heading">{{$post->title}}</h2>
            <hr>
            <p>{{$post->body}}</p>
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
                    <strong class="d-block text-gray-dark">{{$comment->user->name}}</strong>
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
