@extends('layouts.app')

@section('content')

        <div class="col-md-8">
        <form action="{{ url('posts') }}" method="POST">
        @csrf
  <div class="form-group">
    <label for="title">Post Title</label>
    <input type="text" class="form-control" name="title" required id="title" min="30" max="200" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="description">Post Description</label>
    <textarea class="form-control" id="description" required name="description" min="30" max="200" rows="3"></textarea>
  </div>
  <div class="form-group">
                    <label for="profilepic">Upload Photo</label>
                    <input type="file" class="form-control-file" name="select_file" value="" id="profilepic">
   </div>
  <button type="submit" class="btn btn-primary">Add Post</button>
</form>
        </div>
    
@endsection
