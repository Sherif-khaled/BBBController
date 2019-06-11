scr="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js">

    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

/* Create new Post */
$("#submit").click(function(e) {
    e.preventDefault();
    //var form_action = url:"{{route('favorites.reds')}};
    var name = $("#create_user").find("input[name='name']").val();
    var email = $("#create_user").find("input[name='email']").val();
    var password = $("#create_user").find("input[name='password']").val();
    $.ajax({
        dataType: 'json',
        type:'POST',
        url: "http://127.0.0.1:8000/create",
        data:{name:name, email:email,password:password}
    }).done(function(data){

        $(".modal").modal('hide');
        toastr.success('user Created Successfully.', 'Success Alert', {timeOut: 50000});
    });
});

