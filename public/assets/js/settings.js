$(document).ready(function () {
    //Save branding settings

    $('#brandingfrm').on('submit', function (e) {
        e.preventDefault();
        if ($('#brandingfrm').valid()) {
            $.ajax({
                data: new FormData(this),
                type: 'post',
                url: '/options',
                processData: false,
                contentType: false,
                success: function (data) {
                    toastr["success"](data.success, "success");
                },
                error: function (data) {

                }
            });
        }
    });

    $('#generalfrm').on('submit', function (e) {
        e.preventDefault();
        if ($('#generalfrm').valid()) {
            $.ajax({
                data: new FormData(this),
                type: 'post',
                url: '/options',
                processData: false,
                contentType: false,
                success: function (data) {
                    toastr["success"](data.success, "success");
                },
                error: function (data) {

                }
            });
        }
    });
    $('#serverfrm').on('submit', function (e) {
        e.preventDefault();

        if ($('#l_server').is(':checked')) {


            localServerValidate();

        } else if ($('#r_server').is(':checked')) {

            remoteServerValidate();
        }
        $.ajax({
                url: '/options',
                data: new FormData(this),
                type: 'post',
                contentType: false,
                processData: false,
                success: function (data) {
                    toastr["success"](data.success, "success");
                },
                error: function (data) {
                    toastr["error"](data.Failed, "Failed");
                }

            })

    })

});

function localServerValidate() {
    $('#serverfrm').validate({
        rules: {
            'sudo_username': {
                required: true,
                rangelength: [3, 15],

            },
            'sudo_password': {
                required: true,
                rangelength: [6, 15],
            },
        },
        messages: {
            'sudo_username': {
                required: "Please enter the sudo username",
                rangelength: "The sudo username length must be between {0} and {1} characters"

            },
            'sudo_password': {
                required: "Please enter the sudo password",
                rangelength: "The sudo password length must be between {0} and {1} characters"

            },

        }
    });
}

function remoteServerValidate() {

    $('#serverfrm').validate({
        rules: {
            'host_ip': {
                ignore: ".ignore",
                required: true,

            },
            'username': {
                ignore: ".ignore",
                required: true,
                rangelength: [6, 15],
            },
            'password': {
                ignore: ".ignore",
                required: true,
                rangelength: [3, 15],

            },
        },
        messages: {
            'host_ip': {
                required: "Please enter the host IP",
            },
            'username': {
                required: "Please enter the username",
                rangelength: "The sudo username length must be between {0} and {1} characters"

            },
            'password': {
                required: "Please enter the password",
                rangelength: "The sudo password length must be between {0} and {1} characters"

            },

        }
    });
}