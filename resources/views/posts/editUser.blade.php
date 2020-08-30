@extends('layouts.app')

@section('content')

<div class="col-md-8">
        <form action="{{ url('profile') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">User Name</label>
                    <input type="hidden" name="user_id" value="{{$users->id}}">
                    <input type="text" class="form-control" name="name" value="{{$users->name}}" required id="title" min="30" max="200" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="emailid">Email address</label>
                    <input type="email" class="form-control" name="email" value="{{$users->email}}" id="emailid" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="profilepic">Upload Photo</label>
                    <input type="file" class="form-control-file" name="select_file" value="{{$users->image}}" id="profilepic">
                </div>
                <button type="submit" class="btn btn-primary">Update Post</button>
        </form>
</div>

@endsection