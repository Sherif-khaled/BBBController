

    <div class="modal fade" id="modalUserForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold" id="ModalUserTitle"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <form id="frmUser" name="frmUser">
                        @csrf
                        <input type="hidden" name="user_id" id="user_id">
                        <div class="md-form mb-5">
                            <i class="fas fa-user prefix grey-text"></i>
                            <label data-error="wrong" data-success="right" for="name">Full Name</label>
                            <input type="text" name="name" id="name" placeholder="Mohammd" class="form-control" data-validation="required length" data-validation-length="3-15">
                        </div>

                        <div class="md-form mb-5">
                            <i class="fas fa-envelope prefix grey-text"></i>
                            <label data-error="wrong" data-success="right" for="email">Email</label>
                            <input type="email" data-validation="required email emailexist" name="email" id="email" placeholder="mohamed@example.com" class="form-control">
                        </div>

                        <div class="md-form mb-4" id="pass_block">
                            <i class="fas fa-lock prefix grey-text"></i>
                            <label data-error="wrong" data-success="right" for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="password" data-validation="required length" data-validation-length="6-15">
                        </div>
                    </form>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" id="btn_close" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="click" id="btn_save" class="btn btn-default">Save</button>
                </div>
            </div>
        </div>
    </div>


