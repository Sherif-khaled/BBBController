<?php

namespace BBBController\Http\Controllers\Development;

use BBBController\Http\Controllers\Controller;
use BBBController\Permission;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\DataTables;

class PermissionController extends Controller
{
    function index()
    {

    }

    public function getPermissions()
    {
        $columns = ['id', 'name', 'guard_name', 'created_at'];
        $permission = Permission::select( $columns );

        try {
            $datatable = Datatables::of( $permission )->addColumn( 'action', function ($row) {

                $btn = '<a href="javascript:void(0)" id="editPermission" data-id="' . $row->id . '" class="btn btn-primary btn-sm">Edit</a>';

                $btn = $btn . '<a href="javascript:void(0)" id="delPermission" data-toggle="modal" data-target="#confirm_modal"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm">Delete</a> ';

                $btn = $btn . '<a href="javascript:void(0)" id="assignToRole"  data-id="' . $row->id . '" class="btn btn-info btn-sm">Assign to role</a>';

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
        $permission_id = $request->permission_id;

        if ($permission_id == null) {
            Permission::create( [
                "name" => $request->name,
                "guard_name" => $request->guard_name
            ] );
            return \response()->json( ['success' => 'Permission inserted successfully.'] );
        } else {

            $permission = Permission::where( 'id', '=', $permission_id )->first();
            $permission->name = $request->name;
            $permission->guard_name = $request->guard_name;
            $permission->save();
            return \response()->json( ['success' => 'Permission updated successfully.'] );
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
        $permission = Permission::where( 'id', '=', $id )->first( ['id', 'name', 'guard_name'] );

        return response()->json( $permission );
    }

    public function destroy($id)
    {
        Permission::find( $id )->delete();
        return response()->json( ['success' => 'Permission deleted successfully.'] );

    }
}
