@extends('layouts.app')

@section('content')

        <div class="col-md-8">
        <form action="{{ url('posts/'.encrypt($post->id)) }}" method="Post">
        @csrf
        <input type="hidden" name="_method" value="PUT">
  <div class="form-group">
    <label for="title">Post Title</label>
    <input type="text" class="form-control" name="title" value="{{$post->title}}" required id="title" min="30" max="200" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="description">Post Description</label>
    <textarea class="form-control" id="description" required value="{{$post->description}}" name="description" min="30" max="200" rows="3">{{$post->description}}</textarea>
  </div>
  <button type="submit" class="btn btn-primary">Update Post</button>
</form>
        </div>
    
@endsection
