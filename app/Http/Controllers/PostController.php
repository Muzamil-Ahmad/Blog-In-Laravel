<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Validator;
class PostController extends Controller
{
    public function getAllPosts()
    {
        $postsData=DB::table('posts')
                ->leftjoin('users','users.id','=','posts.user_id')
                ->select('posts.*','users.name','users.id as user_id')
                ->orderby('posts.updated_at','desc')
                ->get();
        $likesActivity=DB::table('likes')
                ->join('posts','likes.post_id','=','posts.user_id')
                ->join('users','users.id','=','likes.user_id')
                ->where('likes.user_id','!=',Auth::user()->id)
                ->select('posts.*','likes.*','users.name','users.id as user_id','users.image')
                ->orderby('likes.created_at','desc')
                ->get()->toArray();
       $followingActivity=DB::table('followers')
                ->join('users','users.id','=','followers.following_id')
                ->select('followers.followed_at as created_at','followers.followed_at as follow','users.name','users.image','users.id as user_id')
                ->where(['followers_id'=>Auth::user()->id])
                ->orderby('followers.followed_at','desc')
                ->get()->toArray();
        $getActivites=array_merge($likesActivity,$followingActivity);
                $size=count($getActivites);
                for($i=0; $i<$size-1; $i++)
                {
                    for($j=$i+1;$j<=$size-1;$j++)
                    {
                        $dateToNumberConversion1=strtotime($getActivites[$i]->created_at);
                        $dateToNumberConversion2=strtotime($getActivites[$i]->created_at);
                            if($dateToNumberConversion2 > $dateToNumberConversion1)
                            {
                                $min = $getActivites[$j];
                                $getActivites[$j] = $getActivites[$i];
                                $getActivites[$i] = $min;
                            }
                    } 
                }
     
        return view('home')->with(['postsData'=>$postsData,'getActivites'=>$getActivites]);
    }

    public function newPost(Request $request)
    {
        return view('posts.post');
    }


    public function createPost(Request $request)
    {
            $user_id=Auth::user()->id;

            $validation = Validator::make($request->all(), [
                'select_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
                ]);
                if($validation->passes())
                {
                    $file      = $request->file('select_file');
                    $filename  = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $picture   = date('His').'-'.$filename;
                    $file->move(public_path('img'), $picture);
                    $imagepath="http://localhost/EcosmobTask/public/img/".$picture;
                // DB::table('users')->where(['id'=>$request->user_id])->update(['name'=>$request->name,'email'=>$request->email,'image'=>$imagepath]);
                // return redirect('/user/'.encrypt($request->user_id));
                }
                else
                {
                return response()->json([
                'message'   => $validation->errors()->all(),
                'uploaded_image' => '',
                'class_name'  => 'alert-danger'
                ]);
                }

            DB::table('posts')->insert(['title'=>$request->title,'user_id'=>$user_id,'description'=>$request->description,'image'=>$imagepath,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')]);
            return redirect('/posts');
    }

    public function editPost($id){
        $post=DB::table('posts')->where(['id'=>decrypt($id)])->select('*')->first();
        return view('posts.edit')->with(['post'=>$post]);
    }


    public function updatePost(Request $request,$id){
         $user_id=Auth::user()->id;
         DB::table('posts')->where(['id'=>decrypt($id)])->update(['title'=>$request->title,'user_id'=>$user_id,'description'=>$request->description,'updated_at'=>date('Y-m-d H:i:s')]);
         return redirect('/posts');
    }
    
    public function getUserProfile($id){
        $users=DB::table('users')->where(['id'=>decrypt($id)])->select('id','name','email','image')->first();
        $followers=DB::table('followers')->join('users','users.id','=','followers.followers_id')->where(['following_id'=>decrypt($id)])->select('users.id','name','email','image')->get();
        $following=DB::table('followers')->join('users','users.id','=','followers.following_id')->where(['followers_id'=>decrypt($id)])->select('users.id','name','email','image')->get();
    //    dd($followers);
        return view('posts.user')->with(['users'=>$users,'followers'=>$followers,'following'=>$following]);
    }

    public function editProfile($id)
    {
        $users=DB::table('users')->where(['id'=>decrypt($id)])->select('id','name','email','image')->first();
        return view('posts.editUser')->with(['users'=>$users]);
    }

    public function updateProfile(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'select_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
            if($validation->passes())
            {
                $file      = $request->file('select_file');
                $filename  = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $picture   = date('His').'-'.$filename;
                $file->move(public_path('img'), $picture);
                $imagepath="http://localhost/EcosmobTask/public/img/".$picture;
            // $image = $request->file('select_file');
            // $filename  = $image->getClientOriginalName();
            // $new_name = rand() . '.' . $image->getClientOriginalExtension();
            // $image->move(public_path('images'), $new_name);
            DB::table('users')->where(['id'=>$request->user_id])->update(['name'=>$request->name,'email'=>$request->email,'image'=>$imagepath]);
            return redirect('/user/'.encrypt($request->user_id));
            }
            else
            {
            return response()->json([
            'message'   => $validation->errors()->all(),
            'uploaded_image' => '',
            'class_name'  => 'alert-danger'
            ]);
            }
    }

    public function follow(Request $request)
    {
        // dd($request->all());
        $user_id=Auth::user()->id;
        $count=DB::table('followers')->where(['following_id'=>$request['user_id'],'followers_id'=>$user_id])->count();
        if($count==0)
        {
                DB::table('followers')->insert(['following_id'=>$request['user_id'],'followers_id'=>$user_id,'followed_at'=>date('Y-m-d H:i:s')]);
                return response()->json(['result'=>'follow']);
        }else{
            DB::table('followers')->where(['following_id'=>$request['user_id'],'followers_id'=>$user_id])->delete();
           // $totalLikesCount=DB::table('likes')->where(['post_id'=>$post_id])->count();
            return response()->json(['result'=>'unfollow']);
        }
    }
}
