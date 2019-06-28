 
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="post-preview">
          
          @foreach ($posts as $post)
           <div class="post-preview">
              <a href="/posts/{{$post->id}}">
                <h2 class="post-title">
                  {{$post->title}}
                </h2>
              </a>               
           </div> 
           <hr>        
          @endforeach
          
      </div>
    </div>
  </div>    
@endsection


