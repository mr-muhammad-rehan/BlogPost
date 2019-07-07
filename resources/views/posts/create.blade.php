
 

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

        <form method="POST" action="/posts" enctype="multipart/form-data">

            @csrf
            @method('POST')
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                <label>Title*</label>
                <input type="text" class="form-control @error('title') border-danger @enderror"  placeholder="Title" name="title"  required="" >
                
                </div>
            </div>

            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                <label>Excerpt</label>
                   <input type="text" class="form-control"  placeholder="Excerpt" name="excerpt"   >                
                </div>
            </div>
           
            
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                <label>Post Body*</label>
                <textarea rows="5" class="form-control @error('body') border-danger @enderror" placeholder="Post Description" name="body" required="" ></textarea>
                
                </div>
            </div>

            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                <label>Cover Image</label>
                    <input type="file" class="form-control" name="cover_image" value="Upload File"/>             
                </div>
            </div>
            <br>
            
            <div class="form-group">
                <button type="submit" class="btn btn-primary" >Post Now </button>
            </div>
        </form>

    </div>

@endsection