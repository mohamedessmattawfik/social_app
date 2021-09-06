<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class UserProfileController extends Controller
{
    //
    public function index($post_id){
        return redirect()->route('user.profile' , [$post_id]);
    }

    public function show_profile($post_id){
        $post= Post::find($post_id);
        return view('timeline' , [
            'post'=>  $post
        ]);
    }
}
