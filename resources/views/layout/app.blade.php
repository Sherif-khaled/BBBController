<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Bigbluebutton Admin Panel">
    <meta name="author" content="Sherif Khaled">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bigbluebutton Controller</title>
    <!-- Favicon -->
    <link href="./assets/img/brand/favicon.png" rel="icon" type="image/png">
    <!-- Icons -->
    <link href="./assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link href="./assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <!-- Argon CSS -->
    <link type="text/css" href="./assets/css/argon.css?v=1.0.0" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css">



    <script src="./assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Optional JS -->
    <script src="./assets/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="./assets/vendor/chart.js/dist/Chart.extension.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>

    <script src="{{ asset('assets/js/users.js') }}"></script>


</head>
<body>

@include('layout.modals.confirm')
@include('layout.partial.nav')

<!-- Main content -->
<div class="main-content">

<!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{route('dashboard')}}">Dashboard</a>

            <!-- User -->
            <ul class="navbar-nav align-items-center d-none d-md-flex">
                <li class="nav-item dropdown">
                    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="./assets/img/theme/team-4-800x800.jpg">
              </span>
                            <div class="media-body ml-2 d-none d-lg-block">
                                <span class="mb-0 text-sm  font-weight-bold">Jessica Jones</span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                        <div class=" dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome!</h6>
                        </div>
                        <a href="./examples/profile.html" class="dropdown-item">
                            <i class="ni ni-single-02"></i>
                            <span>My profile</span>
                        </a>
                        <a href="./examples/profile.html" class="dropdown-item">
                            <i class="ni ni-settings-gear-65"></i>
                            <span>Settings</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" class="dropdown-item">

                            <i class="ni ni-user-run"></i>
                            <span>Logout</span>
                        </a>
                        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>

                    </div>
                </li>
            </ul>
        </div>
    </nav>




    <!-- Header -->
    <div class="header bg-gradient-primary" style="padding-bottom: 100px">

    </div>

    <div style="width: 50px ;padding: 30px"></div>

    <!-- Page content -->
    <div class="container-fluid mb--50">
        <div class="row justify-content-center">
            <div>
                @if ($message = Session::get('success'))

                    <div class="alert alert-success alert-block">

                        <button type="button" class="close" data-dismiss="alert">×</button>

                        <strong>{{ $message }}</strong>

                    </div>

                @endif
            </div>

            @yield('content')

        </div>


        <!-- Footer -->
        @include('layout.partial.footer')

</div>




        <!-- Argon JS -->
<script>
        src="./assets/js/argon.js?v=1.0.0"

</script>
    @yield('script')
    <script type="text/javascript">

        $(document).ready(function () {

            $('#detailsModal').on('show.bs.modal', function(e) {

                var recordId = $(e.relatedTarget).data('record-id');

                $("#test").text(recordId);
            });
        });

        $('#confirmModal').on('show.bs.modal', function(c) {

            $('#yesconfirm').click(function (e) {


                    var meetingID = $(c.relatedTarget).data('meeting-id');
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{route('record.delete',"6e99aba8ffce8d5d55c2effcc2f45c644a4d3a31-10-275[30]")}}",
                        type: 'POST',
                        dataType: 'application/json',
                        data: { 'meeting_id': meetingID},
                        success: function (s) {
                            alert(s.message);
                        }
                    });



            })

        });

    </script>

</div>
</body>
</html>