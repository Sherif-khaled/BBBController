<?php

namespace BBBController\Http\Controllers;
use BBBController\Http\Requests\UserRequest;
use BBBController\User;
use http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //use RegistersUsers;

    public function show(){
        $users = User::all();
        return view('users.show',compact('users'));
    }
    public function create(){
        return view('users.create');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    public function store(UserRequest $request){

        $check = User::create([
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => Hash::make($_POST['password']),
        ]);

        $notification = array(
            'message' => 'User created successfully!',
            'alert-type' => 'success'
        );

        return ;

    }
}
