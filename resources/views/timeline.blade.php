@extends('layouts.app')
@section('title') TimeLine @endsection

@section('content')
    <style>
        body {
            background-color: #B3E5FC;
            border-radius: 10px
        }

        .card {
            width: 400px;
            border: none;
            border-radius: 10px;
            background-color: #fff
        }

        .stats {
            background: #f2f5f8 !important;
            color: #000 !important
        }

        .articles {
            font-size: 10px;
            color: #a1aab9
        }

        .number1 {
            font-weight: 500
        }

        .followers {
            font-size: 10px;
            color: #a1aab9
        }

        .number2 {
            font-weight: 500
        }

        .rating {
            font-size: 10px;
            color: #a1aab9
        }

        .number3 {
            font-weight: 500
        }
        </style>
<div class="container mt-5 d-flex justify-content-center">
    <div class="card p-3">
        <div class="d-flex align-items-center">
            <div class="image"> <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="user" class="profile-photo-md pull-left" class="rounded" width="155"> </div>
            <div class="ml-3 w-100">
                <h4 class="mb-0 mt-0">{{$post->user->name}}</h4> <span>{{$post->user->email}}</span>
                <div class="p-2 mt-2 bg-primary d-flex justify-content-between rounded text-white stats">
                    <div class="d-flex flex-column"> <span class="articles">Posts</span> <span class="number1">{{$post->user->posts()->count()}}</span> </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="row">
        <div class="col-md-8">
            <header>
                Post List
            </header>
@foreach($post->user->posts()->get() as $post)
    <p>
        <button class="btn success">{{$post->description}}</button>

        <i class="em em-anguished"></i> <i class="em em-anguished"></i> <i
                class="em em-anguished"></i></p>
@endforeach
        </div>
    </div>
@endsection