<div class="modal fade" id="modalPermissionForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     data-backdrop="static"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold" id="ModalPermissionTitle"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <form id="frmPermission" name="frmPermission" role="form">
                    @csrf
                    <input type="hidden" name="role_id" id="role_id">
                    <div class="md-form mb-5">
                        <label for="name">Permission Name</label>
                        <input type="text" name="name" id="permission_name" placeholder="Enter Permission Name"
                               class="form-control" required>
                    </div>

                    <div class="md-form mb-5">
                        <label for="guard_name">Guard Name</label>
                        <select id="permission_guard_name" name="guard_name" class="form-control">

                            @foreach(array_keys(config('auth.guards')) as $guard)
                                <option value="{{$guard}}">{{$guard}}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="modal-footer d-flex justify-content-center">
                        <button type="button" id="btn_close" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <input type="submit" id="btn_save" class="btn btn-primary" value="Save">
                    </div>
                </form>
            </div>

        </div>

    </div>
</div>



