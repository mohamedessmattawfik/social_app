<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * @return string
     */
    public function index()
    {
        $posts = Post::all();
        return view('post', [
            'posts' => $posts
        ]);
    }

    public function store(StorePostRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['user_id'] = auth()->user()->id;
        Post::create($validatedData);
        return redirect()->back();
    }
}
