<?php

namespace BBBController\Http\Controllers;

use BBBController\Country;
use BBBController\Http\Requests\UserRequest;
use BBBController\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the Users.
     *
     * @return datatable
     */
    public function index()
    {
        return view('users.show');
    }
    public function getUsers(Request $request){
        $columns= ['id', 'name', 'email'];
        $users = User::select($columns);

        $datatable = Datatables::of($users)->addColumn('action', function($row){
//data-toggle="modal" data-target="#detailsModal"
            $btn = '<a href="javascript:void(0)" id="detailsUser"  data-id="'.$row->id.'" class="btn btn-info btn-md detailsUser">Details</a>';

            $btn = $btn.'<a href="javascript:void(0)" id="editUser" data-id="'.$row->id.'" class="btn btn-primary btn-md">Edit</a>';

            $btn = $btn.'<a href="javascript:void(0)" id="delUser" data-toggle="modal" data-target="#confirm_modal"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-md">Delete</a> ';


            return $btn;
        })
            ->rawColumns(['action'])
            ->make(true);
        return $datatable;
    }
    public function profile($id){
        $user = User::with('country')->where('id','=',$id)->first();
        $countries = Country::all();

        return view('users.profile',compact(['user','countries']));
    }
    public function details($id){
        $user = User::where('id','=',$id)->first();
        $country = User::find($id)->country()->first('name');
        if(\request()->ajax()){
            return response()->json(['user' => $user,'country' => $country]);
        }
        else{
            return view('users.profile');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = $request->user_id;

        if($user_id == null){
            $user = User::create([
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => Hash::make($_POST['password']),
            ]);
        }else{

            $user = User::where('id','=',$user_id)->first(['id','name','email']);
            $user->name = $_POST['name'];
            $user->email = $_POST['email'];
            $user->gender = $_POST['gender'];
            $user->country_id = $_POST['country'];
            $user->save();
        }

        return response()->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id' , '=', $id)->first(['id','name','email']);

        return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        return response()->json(['success'=>'User deleted successfully.']);
    }
    public function checkEmailExist()
    {
        $user_mail = User::where('email', '=', $_POST['email'])->first();

        return response()->json(['user' => $user_mail]);
    }

}
