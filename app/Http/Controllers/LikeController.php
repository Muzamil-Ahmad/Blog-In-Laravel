<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class LikeController extends Controller
{
    public function likePost(Request $request)
    {
        $post_id=isset($request->id)?$request->id:0;
        $user_id=Auth::user()->id;
        $count=DB::table('likes')->where(['post_id'=>$post_id,'user_id'=>$user_id])->count();
       
        if($count==0)
        {
            DB::table('likes')->insert(['user_id'=>$user_id,'post_id'=>$post_id,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')]);
            $totalLikesCount=DB::table('likes')->where(['post_id'=>$post_id])->count();
            return response()->json(['result'=>'liked','likesCount'=>$totalLikesCount]);
        }else{
            DB::table('likes')->where(['post_id'=>$post_id,'user_id'=>$user_id])->delete();
            $totalLikesCount=DB::table('likes')->where(['post_id'=>$post_id])->count();
            return response()->json(['result'=>'disliked','likesCount'=>$totalLikesCount]);
        }
        
       
    }
}
