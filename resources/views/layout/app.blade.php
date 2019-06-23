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
    <link href="{{asset('assets/img/brand/favicon.png')}}" rel="icon" type="image/png">
    <!-- Icons -->
    <link href="{{asset('assets/vendor/nucleo/css/nucleo.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <!-- Argon CSS -->
    <link type="text/css" href="{{asset('assets/css/argon.css?v=1.0.0')}}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">

    <!-- Datatable CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">


    <script src="{{asset('assets/vendor/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Optional JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <!-- Datatable JS -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <!-- Form Validation JS -->
{{--    <script src="{{asset('assets/vendor/bootstrap-validator/validator.js')}}"></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/additional-methods.min.js"></script>
    <script src="{{asset('assets/js/validations.js')}}"></script>



    <script src="{{ asset('assets/js/users.js') }}"></script>
    <script src="{{ asset('assets/js/helper.js') }}"></script>



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
                                  @if(Auth::user()->image == null)
                                      @if(Auth::user()->gender == 'Male')
                                          <img alt="Image placeholder" src="{{asset('assets/img/icons/common/male.png')}}">

                                      @else
                                          <img alt="Image placeholder" src="{{asset('assets/img/icons/common/female.png')}}">

                                      @endif
                                  @else
                                      <img alt="Image placeholder" src="{{asset('assets/img/' . Auth::User()->image)}}">

                                  @endif
                              </span>
                            <div class="media-body ml-2 d-none d-lg-block">
                                <span class="mb-0 text-sm  font-weight-bold">{{Auth::User()->name}}</span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                        <div class=" dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome!</h6>
                        </div>
                        <a href="/users/{{auth()->id()}}/profile" class="dropdown-item">
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
@include('layout.alert')


            <div>
                @if (Session::has('message'))

                    <div class="alert alert-success alert-block">

                        <button type="button" class="close" data-dismiss="alert">×</button>

                        <strong>{{ Session::get("message") }}</strong>

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

        toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-bottom-center",
                "preventDuplicates": true,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "500",
                "timeOut": "1500",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }



    </script>

</div>
</body>
</html>