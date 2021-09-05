<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $post_id)
    {
        Comment::create([
            'description' => $request->description,
            'post_id' => $post_id,
            'user_id' => auth()->user()->id
        ]);
        return redirect()->back();
    }
}
