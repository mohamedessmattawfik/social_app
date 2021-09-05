@extends('master')

@section('title') My Child View @endsection

@section('sidebar')
    Child side bar
@endsection

@section('content')
    This is my content for id {{$id}}
@endsection
