<?php

namespace App\Http\Controllers;

class HomePageController extends Controller
{
    public function index($id)
    {
        return view('child', [
            'id' => $id
        ]);
    }
}
