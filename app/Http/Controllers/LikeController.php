<?php

namespace App\Http\Controllers;

use App\Jobs\PostLike;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request, $post_id)
    {
        $Like_db_t = Like::where('user_id' , '=' , auth()->user()->id)
        ->where('post_id' , '=' , $post_id)
        ->where('liked' , '=' , true)
        ->first();
        if($Like_db_t){
            return redirect()->back();
        }
        $Like_db = Like::where('user_id' , '=' , auth()->user()->id)
            ->where('post_id' , '=' , $post_id)
            ->where('liked' , '=' , false)
            ->first();

        if($Like_db) {
            Like::where([
                ["user_id","=",auth()->user()->id],
                ["post_id" , "=" , $post_id],
                ["liked" , "=" , false]
            ])
                ->update(
                    [
                        "user_id" => auth()->user()->id,
                        "post_id" => $post_id,
                        "liked" => true
                    ]
                );
            return redirect()->back();
        }


        Like::create(
            [
                "user_id" => auth()->user()->id,
                "post_id" => $post_id,
                "liked" => true
            ]
        );
        return redirect()->back();


    }

    public function distroy(Request $request, $post_id)
    {
        $Like_db_f= Like::where('user_id' , '=' , auth()->user()->id)
            ->where('post_id' , '=' , $post_id)
            ->where('liked' , '=' , false)
            ->first();
        if($Like_db_f){
            return redirect()->back();
        }
        $Like_db = Like::where('user_id' , '=' , auth()->user()->id)
        ->where('post_id' , '=' , $post_id)
        ->where('liked' , '=' , true)
        ->first();
//        var_dump($Like_db);

        if($Like_db) {
//            var_dump($Like_db);
            Like::where([
                ["user_id","=",auth()->user()->id],
                ["post_id" , "=" , $post_id],
                ["liked" , "=" , true]
            ])
                ->update(
                    [
                        "user_id" => auth()->user()->id,
                        "post_id" => $post_id,
                        "liked" => false
                    ]
                );
            return redirect()->back();
        }


            Like::create(
                [
                    "user_id" => auth()->user()->id,
                    "post_id" => $post_id,
                    "liked" => false
                ]
            );
        return redirect()->back();

    }
}
//
//}
