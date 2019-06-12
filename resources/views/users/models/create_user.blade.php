

    <div class="modal fade" id="modalCreateForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Create User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-5">
                        <i class="fas fa-user prefix grey-text"></i>
                        <label data-error="wrong" data-success="right" for="name">Full Name</label>
                        <input type="text" name="name" id="name" placeholder="Mohammd" class="form-control validate">
                        <div id="err_name" class="error text-danger">{{ $errors->first('name') }}</div>
                    </div>
                    <div class="md-form mb-5">
                        <i class="fas fa-envelope prefix grey-text"></i>
                        <label data-error="wrong" data-success="right" for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="mohamed@example.com" class="form-control validate">
                        <div id="err_email" class="error text-danger">{{ $errors->first('email') }}</div>
                    </div>

                    <div class="md-form mb-4">
                        <i class="fas fa-lock prefix grey-text"></i>
                        <label data-error="wrong" data-success="right" for="password">password</label>
                        <input type="password" name="password" id="password" class="form-control validate" placeholder="password">
                        <div id="err_password" class="error text-danger">{{ $errors->first('password') }}</div>
                    </div>

                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" id="save_btn" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" id="save_btn" class="btn btn-default">Save</button>
                </div>
            </div>
        </div>
    </div>
@section('script')

<script>
    
    $('#modalCreateForm').on('hidden.bs.modal', function(e) {

        $('#create_user input').each(function(key, value) {
            this.value = null;
        });

        $('#err_name').empty();
        $('#err_email').empty();
        $('#err_password').empty();

    });

</script>
@endsection

