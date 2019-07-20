$(document).ready(function () {
    $('#bigbluebuttonfrm').on('submit', function (e) {
        e.preventDefault();
        proccesingLoader(true);

        $.ajax({
            url: "/settings",
            data: new FormData(this),
            type: "post",
            processData: false,
            contentType: false,
            success: function (data) {
                proccesingLoader(false);
                console.log(data)
            },
            error: function (data) {
                console.log(data)

            }
        })
    });

    $('#html5frm').on('submit', function (e) {
        e.preventDefault();
        proccesingLoader(true);
        $.ajax({
            url: "/settings",
            data: new FormData(this),
            type: "post",
            processData: false,
            contentType: false,
            success: function (data) {
                proccesingLoader(false);
                console.log(data)
            },
            error: function (data) {
                proccesingLoader(false);
                console.log(data)

            }
        })
    })
});