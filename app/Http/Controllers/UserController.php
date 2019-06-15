<?php

namespace BBBController\Http\Controllers;

use BBBController\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.show');
    }
    public function getUsers(Request $request){
        $columns= ['id', 'name', 'email'];
        $users = User::select($columns);

        $datatable = Datatables::of($users)->addColumn('action', function($row){

            $btn = '<a href="javascript:void(0)" data-toggle="modal"  data-target="#modal_form" data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';

            $btn = $btn.' <a href="javascript:void(0)" data-toggle="modal" data-target="#confirm_modal"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';

            return $btn;
        })
            ->rawColumns(['action'])
            ->make(true);
        return $datatable;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
