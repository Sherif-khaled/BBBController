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
                    console.log(data);

                    toastr["success"]("Settings updated successfully.", "success");
                },
                error: function (data) {

                }
            });
        }
    })

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
                    console.log(data);

                    toastr["success"]("Settings updated successfully.", "success");
                },
                error: function (data) {

                }
            });
        }
    })

})