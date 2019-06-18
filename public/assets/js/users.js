let pass_html
$(document).ready(function () {

 $('body').on('click','#detailsUser',function () {
     user_id = $(this).data('id');
     /* get user to edit form */
     $.get('/users/' + user_id +'/profile', function (data) {
         if(data.country.name === null){
             alert('ddddddd');
         }
         $('#prof_name').html(data.user.name);
         $('#prof_email').html('<i class="fas fa-envelope"></i> ' + data.user.email);
         $('#prof_phone').html('<i class="fas fa-mobile-alt"></i> ' + data.user.phone);
         $('#prof_gender').html('<i class="fa fa-venus-mars"></i> ' + data.user.gender);
         $('#prof_country').html(data.country.name);
     });
     $('#detailsModal').modal('show');

 });

    $.validate({
        modules : 'toggleDisabled',
        disabledFormFilter : 'form.toggle-disabled',
        showErrorDialogs : false
    });
    getUsers();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    /* When click create user */
    $('#createUser').click(function () {
        $("#modalUserForm").on('show.bs.modal', function(e){
            if($('#password').length === 0){
                $('#pass_block').append(pass_html);
            }
        });
        $('#ModalUserTitle').html('Create New User');
        $('#frmUser').trigger('reset');
        $('#modalUserForm').modal('show');
    })

    /* When click edit user */
    let user_id
    $('body').on('click', '#editUser', function () {
        //change modal title
        $('#ModalUserTitle').html('Edit User');
        //reset the modal from any old data
        $('#frmUser').trigger('reset');
        //get parent password div content to public variable
        pass_html = $('#pass_block').html();
        //when modal show event
        $("#modalUserForm").on('show.bs.modal', function(){
            // if password element exist
            if($('#password').length > 0){
                //remove all elements in pass_block div
                $('#pass_block').empty();
            }
        });
        //show modal
        $('#modalUserForm').modal('show');


             user_id = $(this).data('id');
            /* get user to edit form */
            $.get('/users/' + user_id +'/edit', function (data) {
                $('#user_id').val(data.id);
                $('#name').val(data.name);
                $('#email').val(data.email);
            });
    });



    /* When click save button will create or update a user */
    $('#btn_save').click(function (e) {
        e.preventDefault();
        $.validate();
        $.ajax({
            data: $('#frmUser').serialize(),
            type:'post',
            url:'/users',
            success:function (data) {

                if($('#user_id').val().length == 0){
                    toastr["success"]("User inserted successfully.", "success");
                }
                else{
                    toastr["success"]("User updated successfully.", "success");
                }

                $('#modalUserForm').modal('hide');
                $('#users_table').DataTable().destroy();
                getUsers();
            },
            error:function (data) {

            }
        });
    })

    /* When click yes confirm will delete the selected user */
    $('#yes_confirm').click(function (e) {
        e.preventDefault()
        let id = $('#delUser').data('id');
        $.ajax({
            type: "DELETE",
            url:"/users/"+id,
            success:function (data) {
                toastr["success"]("User deleted successfully.", "success")

                $('#confirm_modal').modal('hide');
                $('#users_table').DataTable().destroy();
                getUsers();
            }
        })
    })
});

/* get user datatable */
function getUsers(){
    $('#users_table').DataTable({

        "responsive": true,
        "processing": true,
        "serverSide": true,
        "searching": true,
        "ordering": true,
        "ajax": "/getusers",

        "columns": [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
    });
    $('#users_table').DataTable().columns.adjust();
}





