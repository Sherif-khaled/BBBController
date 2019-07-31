<?php

namespace BBBController\Http\Controllers\Development;

use BBBController\Http\Controllers\Controller;
use BBBController\Role;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\DataTables;

class RoleController extends Controller
{
    function index()
    {

    }

    public function getRoles()
    {
        $columns = ['id', 'name', 'guard_name', 'created_at'];
        $roles = Role::select( $columns );

        try {
            $datatable = Datatables::of( $roles )->addColumn( 'action', function ($row) {

                $btn = '<a href="javascript:void(0)" id="editRole" data-id="' . $row->id . '" class="btn btn-primary btn-sm">Edit</a>';

                $btn = $btn . '<a href="javascript:void(0)" id="delRole" data-toggle="modal" data-target="#confirm_modal"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm">Delete</a> ';

                $btn = $btn . '<a href="javascript:void(0)" id="assignPermissions" data-toggle="modal" data-target="#modalAssignPermissionsForm"  data-id="' . $row->id . '" class="btn btn-info btn-sm">Assign Permissions</a>';

                return $btn;
            } )
                ->rawColumns( ['action'] )
                ->make( true );
            return $datatable;
        } catch (Exception $e) {

        }
        return true;

    }

    function store(Request $request)
    {
        $role_id = $request->role_id;

        if ($role_id == null) {
            Role::create( [
                "name" => $request->name,
                "guard_name" => $request->guard_name
            ] );
            return \response()->json( ['success' => 'Role inserted successfully.'] );
        } else {

            $role = Role::where( 'id', '=', $role_id )->first();
            $role->name = $request->name;
            $role->guard_name = $request->guard_name;
            $role->save();
            return \response()->json( ['success' => 'Role updated successfully.'] );
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $role = Role::where( 'id', '=', $id )->first( ['id', 'name', 'guard_name'] );

        return response()->json( $role );
    }

    public function destroy($id)
    {
        Role::find( $id )->delete();
        return response()->json( ['success' => 'Role deleted successfully.'] );

    }
}
