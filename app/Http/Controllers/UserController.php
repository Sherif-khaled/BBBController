<?php

namespace BBBController\Http\Controllers;

use Auth;
use BBBController\Country;
use BBBController\User;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

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

    public function getUsers(){
        $columns= ['id', 'name', 'email'];
        $users = User::select($columns);

        try {
            $datatable = Datatables::of( $users )->addColumn( 'action', function ($row) {

                $btn = '<a href="javascript:void(0)" id="detailsUser"  data-id="' . $row->id . '" class="btn btn-info btn-sm detailsUser">Details</a>';

                $btn = $btn . '<a href="javascript:void(0)" id="editUser" data-id="' . $row->id . '" class="btn btn-primary btn-sm">Edit</a>';

                $btn = $btn . '<a href="javascript:void(0)" id="delUser" data-toggle="modal" data-target="#confirm_modal"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm">Delete</a> ';


                return $btn;
            } )
                ->rawColumns( ['action'] )
                ->make( true );
            return $datatable;
        } catch (Exception $e) {

        }

    }

    public function profile($id){
        $user = User::where('id','=',$id)->first();
        $countries = Country::all();
        $gender = ['Male','Female','Other'];
        return view( 'users.profile', compact( ['user', 'countries', 'gender'] ) );
    }

    public function details($id){
        $user = User::where('id','=',$id)->first();
        $country = User::find($id)->country()->first('name');
        if(request()->ajax()){
            return response()->json(['user' => $user,'country' => $country]);
        } else{
            return view('users.profile');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $user_id = $request->user_id;

        try{
            if($user_id == null){
                User::create([
                    'name' => $_POST['name'],
                    'email' => $_POST['email'],
                    'password' => Hash::make($_POST['password']),
                ]);
            } else{

                $user = User::where('id','=',$user_id)->first();
                $user->name = $_POST['name'];
                $user->email = $_POST['email'];
                if($request->has('profile')){

                    $user->gender = $_POST['gender'];
                    $user->country_id = $_POST['country'];
                    if ($request->hasFile('image')) {
                        $image = $request->file('image');
                        $name = str_slug($_POST['name']).'.'.$image->getClientOriginalExtension();
                        $destinationPath = public_path('/assets/img');
                        $image->move($destinationPath, $name);
                        $user->image = $name;
                    }
                }

                $user->save();
            }
        }catch (QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                return response()->json('User Exist');
            } else{return response()->json($e->message());}
        }
        return response()->json($request);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
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
     * @return Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        return response()->json(['success'=>'User deleted successfully.']);
    }

    public function checkEmailExist()
    {
        $user_mail = User::where('email', '=', $_POST['email']);

        if($user_mail->count() == 0){
            return response()->json(true);

        }

        return response()->json(false);
    }

    public function changePassword(){
        if(Auth::Check()){
            $check = Hash::check(request('currentPassword'),Auth::User()->password);
            if($check){
                $user = User::find(Auth::User()->id);
                $user->password = Hash::make($_POST['newPassword']);
                $user->save();
                return response()->json(['success' => 'THe password changed successfully.']);
            } else{
                return response()->json(['unauthenticated' => 'Wrong current password' ]);
            }

        } elseif (Auth::Check() == false){
            return response()->json(['unauthenticated' => "You don't have authenticated to change the password" ]);
        } else{
            return response()->json(['undefined' => "Undefined error"]);
        }
    }

}
