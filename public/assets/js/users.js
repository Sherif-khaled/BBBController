import $ from "../vendor/onscreen/dist/on-screen.es6";

let pass_html;
$(document).ready(function () {
    $('#frmChangePassword').submit(function (e) {
        e.preventDefault();
        if($(this).valid()){
            $.ajax({
                data:$(this).serialize(),
                url:'/changepassword',
                type:'post',
                success:function (data) {
                    if(data.hasOwnProperty('success')){
                        toastr["success"](data.success, "success");
                    }
                    else if(data.hasOwnProperty('unauthenticated')){
                        toastr["error"](data.unauthenticated, "Unauthenticated");
                    }
                    else{
                        toastr["error"](data.undefined, "Undefined");
                    }

                }
            });
        }
    });

    $("#modalUserForm").on('hidden.bs.modal', function(){
        $(this).find('form')[0].reset();
        $("form").each(function(){
            $(this).validate().resetForm();
        });
    });


 $('body').on('click','#detailsUser',function () {
     user_id = $(this).data('id');
     /* get user to edit form */
     $.get('/users/' + user_id +'/details', function (data) {
         let assetsURL = window.location.origin + '/assets/img/icons/common/';
         let imgURL = window.location.origin + '/assets/img/';
         $('#prof_name').html(data.user.name);
         $('#prof_email').html('<i class="fas fa-envelope"></i> ' + data.user.email);
         $('#prof_phone').html('<i class="fas fa-mobile-alt"></i> ' + data.user.phone);
         $('#prof_gender').html('<i class="fa fa-venus-mars"></i> ' + data.user.gender);
         $('#prof_country').html(data.country.name);
         if (!$.trim(data.user.image)) {
             if (data.user.gender !== 'Male') {
                 getBase64Image(assetsURL + 'female.png', function (base64) {
                     $('#detailsAvatar').attr('src', base64);
                 });
             } else {
                 getBase64Image(assetsURL + 'male.png', function (base64) {
                     $('#detailsAvatar').attr('src', base64);
                 });

             }
         } else {

             getBase64Image(imgURL + data.user.image, function (base64) {
                 $('#detailsAvatar').attr('src', base64);
             });
         }
     });
     $('#detailsModal').modal('show');

 });
    getUsers();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    /* When click create user */
    $('#createUser').click(function () {
        $("#modalUserForm").on('show.bs.modal', function(){
            if($('#password').length === 0){
                $('#pass_block').append(pass_html);
            }
        });
        $('#ModalUserTitle').html('Create New User');
        $('#frmUser').trigger('reset');
        $('#modalUserForm').modal('show');
    });

    /* When click edit user */
    let user_id;
    $('body').on('click', '#editUser', function () {
        //change modal title
        $('#ModalUserTitle').html('Edit User');
        //reset the modal from any old data
        $('#frmUser').trigger('reset');

        //when modal show event
        $("#modalUserForm").on('show.bs.modal', function(){
            //get parent password div content to public variable
            pass_html = $('#pass_block').html();
            // if password element exist
            if($('#password').length > 0){
                //remove all elements in pass_block div
                $('#pass_block').empty();
            }
        });
        //show modal
        $('#modalUserForm').modal('show');
            $( "#frmUser" ).validate({ignore: ".ignore"});


             user_id = $(this).data('id');
            /* get user to edit form */
            $.get('/users/' + user_id +'/edit', function (data) {
                $('#user_id').val(data.id);
                $('#name').val(data.name);
                $('#email').val(data.email);
            });
    });

    /* When click save button will create or update a user */
    $('#frmUser').submit(function (e) {
       if($('#frmUser').valid()){
           e.preventDefault();

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
                   console.log(data);
               }
           });
       }
    })


    /* When click save changes on user profile */

    $('#frmProfile').on('submit',function (e) {
        e.preventDefault();
        let formData = new FormData();
        formData.append('user_id',$('#user_id').val());
        formData.append('name',$('#name').val());
        formData.append('email',$('#email').val());
        formData.append('file',$('input[type=file]')[0].files[0]);

        if($('#frmProfile').valid()){
            $.ajax({
                data: new FormData(this),
                type:'post',
                url:'/users',
                processData: false,
                contentType: false,
                success:function (data) {
                    console.log(data);

                    toastr["success"]("User updated successfully.", "success");
                },
                error:function (data) {

                }
            });
        }
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




