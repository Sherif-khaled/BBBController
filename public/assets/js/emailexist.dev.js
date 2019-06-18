let email_value;
$.formUtils.addValidator({
    name : 'emailexist',
    validatorFunction : function(value, $el, config, language, $form) {
        var email = $('#email').val();

        $.ajax({
            url: '/checkemail',
            type: 'post',
            data: {
                'email_check' : 1,
                'email' : email,
            },
            success: function(data){
                email_value = data.user.email
            }
        });
        return value !== email_value;

    },
    errorMessage : 'This emil is exist',
    errorMessageKey: 'EmailExist'
});
