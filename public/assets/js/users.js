// scr = "http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js" >
//
//     //Create User
//     $(document).on('submit', 'form#create_user', function (e) {
//
//         e.preventDefault();
//         var form = $(this);
//         var data = new FormData($(this)[0]);
//         var url = "/users/create";
//
//         var name = $("#create_user").find("input[name='name']").val();
//         var email = $("#create_user").find("input[name='email']").val();
//         var password = $("#create_user").find("input[name='password']").val();
//
//         $.ajaxSetup({
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             }
//         });
//
//         $.ajax({
//             dataType: 'json',
//             type: 'POST',
//             url: url,
//             data: data,
//             cache: false,
//             contentType: false,
//             processData: false,
//             xhrFields: {
//                 withCredentials: true
//             },
//             error: function (request, status, error) {
//                 json = $.parseJSON(request.responseText);
//                 $('#err_name').empty().append(json.errors.name)
//                 $('#err_email').empty().append(json.errors.email)
//                 $('#err_password').empty().append(json.errors.password)
//             }
//
//         }).done(function (data) {
//
//             $(".modal").modal('hide');
//             toastr.success('user Created Successfully.', 'Success Alert', {timeOut: 50000});
//             manageRow(data);
//         });
//
//     });
//
// /* Add new Post table row */
// function manageRow(data) {
//     var	rows = '';
//     var rowCount = $('#users_table tr').length;
//     let id = rowCount;
//
//         rows = rows + '<tr>';
//         rows = rows + '<td>'+id+'</td>';
//         rows = rows + '<td>'+data.name+'</td>';
//         rows = rows + '<td>'+data.email+'</td>';
//         rows = rows + '<td>test</td>';
//         rows = rows + '<td>';
//         rows = rows + '<a href="" class="btn btn-info">Profile</a>';
//         rows = rows + '<a href="" class="btn btn-danger">Delete</a>';
//         rows = rows + '</td>';
//         rows = rows + '</tr>';
//
//     $("tbody").append(rows);
// }
//
//
//
//
//
//***********************************************************************************
$(document).ready(function () {
    getUsers();
});

function getUsers(){
    $('#users_table').DataTable({

        "responsive": true,
        "processing": true,
        "serverSide": true,
        "ajax": "/getusers",

        "columns": [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
    });
}