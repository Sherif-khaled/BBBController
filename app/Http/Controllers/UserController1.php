<?php

namespace BBBController\Http\Controllers;
use BBBController\Http\Requests\UserRequest;
use BBBController\User;
use Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController1 extends Controller
{


    public function index(){

        $users = User::all();

        return view('users.show',compact('users'));
    }
    public function create(UserRequest $request){

        $user = User::create([
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => Hash::make($_POST['password']),
        ]);

        $notification = array(
            'message' => 'User created successfully!',
            'alert-type' => 'success'
        );

        return response()->json($user);

    }

}
