@extends('layouts.app')

<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> -->
@section('content')

<div class="container">
    <div class="row my-2">
        <div class="col-lg-8 order-lg-2">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a>
                </li>
                <li class="nav-item">
                    <a href="" data-target="#followers" data-toggle="tab" class="nav-link">Followers</a>
                </li>
                <li class="nav-item">
                    <a href="" data-target="#following" data-toggle="tab" class="nav-link">Following</a>
                </li>
            </ul>
            <div class="tab-content py-4">
                <div class="tab-pane active" id="profile">
                    <h5 class="mb-3">User Profile</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Email Address</h6>
                            <p>
                                {{$users->email}}
                            </p>
                            <h6>Hobbies</h6>
                            <p>
                                Indie music, skiing and hiking. I love the great outdoors.
                            </p>
                        </div>
                        <div class="col-md-6">
                           
                        </div>
                        <div class="col-md-12">
                            
                        </div>
                    </div>
                    <!--/row-->
                </div>
                <div class="tab-pane" id="followers">
                <ul class="list-group">
                        @foreach($followers as $fol)
                        <a href="" > <li class="list-group-item disabled"><img src="{{$fol->image}}" style="height:50px;radius:5px"  alt="avatar">{{ $fol->name }}</li></a>
                        @endforeach
                </ul>
                </div>
                <div class="tab-pane" id="following">
                <ul class="list-group">
                @foreach($following as $fol)
                    <a href="" > <li class="list-group-item disabled"><img src="{{$fol->image}}" style="height:50px;radius:5px"  alt="avatar">{{ $fol->name }}</li></a>
                @endforeach
                </ul>
                       
                </div>
            </div>
        </div>
        <div class="col-lg-4 order-lg-1 text-center">
            <img src="{{$users->image}}" class="mx-auto img-fluid img-circle d-block" alt="avatar">
            <h6 class="mt-2">{{$users->name}}</h6>
            <label class="custom-file">
            @if(Auth::user()->id==$users->id)
            <a href="{{ url('editProfile/'.encrypt($users->id)) }}" class="btn btn-primary">Edit Profile</a>
            @endif
            @if(Auth::user()->id!=$users->id)
            <button class="btn btn-primary" id="followUser" onclick="followUser({{$users->id}})">{{\DB::table('followers')->where(['following_id'=>$users->id,'followers_id'=>Auth::user()->id])->count()==0?"Follow":"Following"}}</button>
            @endif 
               <!-- <input type="file"  id="file" class="custom-file-input">
                <span class="custom-file-control">Choose file</span> -->
            </label>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
function followUser(user_id)
{
    
      $.ajax({
        url:"{{ url('follow/user') }}",
        method:"POST",
        data : {_token:"{{csrf_token()}}",user_id},
        dataType:'JSON',
        success : function(response)
                {
                        if(response.result=='follow'){
                    $("#followUser").html("Following"); 
                }else{
                    $("#followUser").html("Follow"); 
                }
                }
        })
    // });
}
// function fileClick(){
//     $('#file').change();
// }
// $('#file').on('change', function(event){
//  //event.preventDefault();
//  let file=$('#file').val();


</script>
@endsection