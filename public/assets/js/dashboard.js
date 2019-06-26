$(document).ready(function () {

    $('.enbchk').change(function (e) {
        e.preventDefault();

        let service_id = $(this).data('id');
        let status = 0;


        if($(this).is(":checked")) {
         status = 1;
        }
        alert($(this).data('id'));

        $.ajax({
            url: '/changestatus/' + service_id,
            method:'post',
            data:{enabled:status},
            success:function (data) {
            },
            error:function (data) {
            }

        });
    })
})