<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EditProfileController extends Controller
{
    //
    protected function edit(Request $data)
    {

        $User = User::find(auth()->user()->id);
        return User::where('id', auth()->user()->id)
            ->update(['name'=>$data->name , 'email'=>$data->email , 'image'=>$data->image]);


//        $User->name = $data ->name;
//        $User->image = $data ->image;
//        $User->email = $data-> email;



//        return User::create([
//            'name' => $data['name'],
//            'email' => $data['email'],
//            'password' => Hash::make($data['password']),
//        ]);
    }
}
