@extends('layouts.app')

@section('content')
        <div class="col-md-8">
        @foreach($postsData as $data)
           <div class="card" style="width: 100%;">
                <img src="{{$data->image}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$data->title}}</h5>
                    <p><a href="{{ url('user/'.encrypt($data->user_id)) }}">{{$data->name}}</a></p>
                    <p class="card-text">{{$data->description}}</p>
                    
                    <a href="{{ url('posts/'.encrypt($data->id)) }}" class="btn btn-primary">Edit</a>
                    <button type="button" id="likeButton" onclick="like({{$data->id}},this)" class="btn btn-primary">
                    {{\DB::table('likes')->where(['likes.post_id'=>$data->id,'likes.user_id'=>Auth::user()->id])->count()==0?"Like":"Dislike"}}<span id="likeBadge" class="badge badge-light">{{\DB::table('likes')->where(['likes.post_id'=>$data->id])->count()}}</span>
                                </button>
                </div>
                </div>
        @endforeach
        </div>
        <div class="col-md-4">
                 
                 <div class="list-group">
                         <a href="#" class="list-group-item list-group-item-action active">
                             Notifications
                         </a>
                         @foreach($getActivites as $noti)
                                @if(isset($noti->like_id))
                                <a href="#" class="list-group-item list-group-item-action"><img src="{{$noti->image}}" style="height:50px;radius:20px"  alt="avatar">{{$noti->name}} liked {{$noti->title}} </a>
                                @endif
                                @if(isset($noti->follow))
                                <a href="#" class="list-group-item list-group-item-action"><img src="{{$noti->image}}" style="height:50px;radius:20px"  alt="avatar">{{$noti->name}} is following You. </a>
                                @endif
                         @endforeach
                 </div>
                 
                 </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script>
//       $(document).ready(function(){

 
     


//       });
      function like(id,_this){
              let likesCount=0;
        $.ajax({
                type : "POST",
                url  : "{{ url('posts/like') }}",
                data : {_token:"{{csrf_token()}}",id},
                success : function(response)
                {
                        console.log(response.result)
                        if(response.result == 'liked')
                        { 
                                likesCount+=1;
                                $(_this).find("#likeBadge").html(likesCount) 
                                $(_this).html("Dislike <span id='likeBadge' class='badge badge-light'>"+response.likesCount+"</span>")
                        }else{
                                likesCount-=1;
                                $(_this).find("#likeBadge").html(likesCount) 
                                $(_this).html("Like <span id='likeBadge' class='badge badge-light'>"+response.likesCount+"</span>")
                        }
                }
              });      
      }
      
      </script>
@endsection
