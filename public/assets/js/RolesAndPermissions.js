$(document).ready(function () {
    /* get Roles datatable */
    getRoles();

    /* get Permissions datatable */
    getPermissions();


    /* When click create Role */
    $('#createRole').click(function () {
        $('#ModalRoleTitle').html('Create New Role');
        $('#frmRole').trigger('reset');
        $('#modalRoleForm').modal('show');
    });

    /* When click Edit Role */
    let role_id;
    $('body').on('click', '#editRole', function () {
        //change modal title
        $('#ModalRoleTitle').html('Edit Role');
        //reset the modal from any old data
        $('#frmRole').trigger('reset');

        //show modal
        $('#modalRoleForm').modal('show');
        $("#frmRole").validate({ignore: ".ignore"});


        role_id = $(this).data('id');
        /* get Role to edit form */
        $.get('/roles/' + role_id + '/edit', function (data) {
            $('#role_id').val(data.id);
            $('#name').val(data.name);
            $('#guard_name').val(data.guard_name);
        });
    });

    /* When click save button will create or update a Role */
    $('#frmRole').submit(function (e) {
        if ($('#frmRole').valid()) {
            e.preventDefault();

            $.ajax({
                data: $('#frmRole').serialize(),
                type: 'post',
                url: '/roles',
                success: function (data) {
                    if (data.hasOwnProperty('success')) {
                        toastr["success"](data.success, "success");
                    }

                    $('#modalRoleForm').modal('hide');
                    $('#roles_table').DataTable().destroy();
                    getRoles();
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }
    });

    /* When click yes confirm will delete the selected Role */
    $('body').on('click', '#delRole', function () {
        let id = $(this).data('id');

        $('#yes_confirm').click(function (e) {
            e.preventDefault();

            $.ajax({
                type: "post",
                url: "/roles/" + id,
                success: function (data) {
                    if (data.hasOwnProperty('success')) {
                        toastr["success"](data.success, "success")
                    }

                    $('#confirm_modal').modal('hide');
                    $('#roles_table').DataTable().destroy();
                    getRoles();
                }
            })
        });

    });

    /***************************************************************************************************/
    $('#createPermission').click(function () {
        $('#ModalPermissionTitle').html('Create New Permission');
        $('#frmPermission').trigger('reset');
        $('#modalPermissionForm').modal('show');
    });

    /* When click Edit Permission */
    let permission_id;
    $('body').on('click', '#editPermission', function () {
        //change modal title
        $('#ModalPermissionTitle').html('Edit Permission');
        //reset the modal from any old data
        $('#frmPermission').trigger('reset');

        //show modal
        $('#modalPermissionForm').modal('show');
        $("#frmPermission").validate({ignore: ".ignore"});


        permission_id = $(this).data('id');

        /* get Permission to edit form */
        $.get('/permissions/' + permission_id + '/edit', function (data) {
            $('#permission_id').val(data.id);
            $('#permission_name').val(data.name);
            $('#permission_guard_name').val(data.guard_name);
        });
    });

    /* When click save button will create or update a Permission */
    $('#frmPermission').submit(function (e) {
        if ($('#frmPermission').valid()) {
            e.preventDefault();

            $.ajax({
                data: $('#frmPermission').serialize(),
                type: 'post',
                url: '/permissions',
                success: function (data) {
                    if (data.hasOwnProperty('success')) {
                        toastr["success"](data.success, "success");
                    }

                    $('#modalPermissionForm').modal('hide');
                    $('#permissions_table').DataTable().destroy();
                    getPermissions();
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }
    });

    /* When click yes confirm will delete the selected Permission */
    $('body').on('click', '#delPermission', function () {
        let id = $(this).data('id');

        $('#yes_confirm').click(function (e) {
            e.preventDefault();

            $.ajax({
                type: "post",
                url: "/permissions/" + id,
                success: function (data) {
                    if (data.hasOwnProperty('success')) {
                        toastr["success"](data.success, "success")
                    }

                    $('#confirm_modal').modal('hide');
                    $('#permissions_table').DataTable().destroy();
                    getPermissions();
                }
            })
        });

    });


});

function getRoles() {
    $('#roles_table').DataTable({
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "searching": false,
        "ordering": true,
        "ajax": "/getroles",

        "columns": [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'guard_name', name: 'guard_name'},
            {data: "created_at", name: 'created_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
    });
    $('#roles_table').DataTable().columns.adjust();
}

function getPermissions() {
    $('#permissions_table').DataTable({
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "searching": false,
        "ordering": true,
        "ajax": "/getpermissions",

        "columns": [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'guard_name', name: 'guard_name'},
            {data: "created_at", name: 'created_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
    });
    $('#permissions_table').DataTable().columns.adjust();
}
