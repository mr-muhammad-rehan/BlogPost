


@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Create Post</h1>

        @if ($errors->any())
            @foreach ($errors->all() as $err)
                <div class="alert alert-danger" role="alert">
                        {{$err}}
                </div>
            @endforeach
        @endif

        <form method="POST" action="/posts/{{$post->id}}">

            @csrf
            @method('PUT')
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                <label>Title</label>
                <input type="text" class="form-control @error('title') border-danger @enderror"  placeholder="Title" name="title"   required="" value="{{$post->title}}" >

                </div>
            </div>

            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                <label>Excerpt</label>
                <input type="text" class="form-control @error('excerpt') border-danger @enderror"  placeholder="Excerpt" name="excerpt"  value="{{$post->excerpt}}" >

                </div>
            </div>


            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                <label>Post Body</label>
                <textarea rows="5"  id="body" class="form-control @error('body') border-danger @enderror" placeholder="Post Description" name="body" required="" >{{$post->body}}</textarea>

                </div>
            </div>
            <br>

            <div class="form-group">
                <button type="submit" class="btn btn-primary" > Update </button>
            </div>
        </form>


        <form method="POST" action="/posts/{{$post->id}}" >
            @method('DELETE')
            @csrf
            <button class="btn btn-danger" type="submit" > Delete </button>
        </form>

    </div>

@endsection
