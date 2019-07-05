$(document).ready(function () {
    // just for the demos, avoids form submit
    jQuery.validator.setDefaults({
        debug: true,
        success: "valid text-info",
        errorClass: "invalid text-danger",
        errorElement: "span",
        ignore: ".ignore",

    });


    $("#frmUser").validate({
        rules: {
            name: {
                required: true,
                minlength: 3,
                maxlength: 15,
            },
            email: {
                required: true,
                email: true,
                remote: {
                    url: "/checkemail",
                    type: "post",
                    data: {
                        function(data) {

                        },

                    }
                },
            },
            password: {
                required: true,
                rangelength: [6, 15],
            },
            confirm_password: {
                equalTo: '#password'
            }
        },
        messages: {
            name: {
                required : "Please enter the full name",
                minlength: jQuery.validator.format("At least {0} characters required!"),
                maxlength: jQuery.validator.format("At least {0} characters required!"),
            },

            email: {
                required: "Please enter the user email address",
                email: "The email address must be in the format of <br> <\'name@domain.com'>",
                remote : "This email is already exist"
            },
            password: {
                required: "Please enter the user password",
                rangelength: "The password length must be between {0} and {1} characters"
            },
            confirm_password: {
                equalTo: "The Confirm password not equal the password"
            }

        }
    });
    let value;
    $('#email').focus(function () {
        value = $(this).val();
    });
    $('#frmProfile').validate({
        rules: {
            name: {
                required: true,
                minlength: 3,
                maxlength: 15,
            },
            email: {
                required: true,
                email: true,
                remote: {
                    url: "/checkemail",
                    type: "post",
                    data: {
                        function() {
                            if (value === $('#email').val()) {
                            } else {
                                return;

                            }
                        },

                    }
                },
            }
        },
        messages: {
            name: {
                required : "Please enter your full name",
                minlength: jQuery.validator.format("At least {0} characters required!"),
                maxlength: jQuery.validator.format("At least {0} characters required!"),
            },

            email: {
                required: "Please enter your email address",
                email: "The email address must be in the format of <br> <\'name@domain.com'>",
                remote : "This email is already exist"
            }

        }
    });

    $('#frmChangePassword').validate({
        rules:{
            newPassword: {
                required: true,
                rangelength: [6, 15],
            },
            confirmPassword: {
                equalTo: '#newPassword'
            }
        },
        messages:{
            confirmPassword: {
                required: "Please enter the new password",
                rangelength: "The password length must be between {0} and {1} characters"
            },
            confirmPassword: {
                equalTo: "The Confirm password not equal the new password"
            }
        }
    });

    $('#brandingfrm').validate({
        rules: {
            'company-name': {
                required: true,
                rangelength: [3, 25],
            },
            'logo-path': {
                accept: "image/*"
            }
        },
        messages: {
            'company-name': {
                required: "Please enter the company name",
                rangelength: "The company name length must be between {0} and {1} characters"
            },
            'logo-path': {
                required: "Please upload company logo",
                accept: "Allow images extensions only"
            }

        }
    });

    $('#generalfrm').validate({
        rules: {
            'records-path': {
                required: true,
            },
        },
        messages: {
            'records-path': {
                required: "Please select the bigbluebutton records path",
            },

        }
    })
});