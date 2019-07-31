<div class="modal fade" id="modalAssignPermissionsForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     data-backdrop="static"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold" id="ModalAssignPermissionsTitle">Assign Permissions</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <form id="frmRole" name="frmRole" role="form">
                    @csrf


                    <div class="modal-footer d-flex justify-content-center">
                        <button type="button" id="btn_close" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <input type="submit" id="btn_save" class="btn btn-primary" value="Save">
                    </div>
                </form>
            </div>

        </div>

    </div>
</div>




