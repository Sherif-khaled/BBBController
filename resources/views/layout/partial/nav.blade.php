<!-- Sidenav -->
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="./index.html">
            <img src="{{asset('assets/img/brand/logo')}}" style="  height: 200px;
  width: 50%;" class="navbar-brand-img" alt="...">
        </a>

        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="./index.html">
                            <img src="{{asset('assets/img/brand/blue.png')}}">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href='{{route('dashboard')}}'>
                        <i class="ni ni-tv-2 text-primary"></i> Dashboard
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="{{route('record.show')}}">
                        <i class="ni ni-planet text-blue"></i> Records
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('settings.index')}}">
                        <i class="ni ni-pin-3 text-orange"></i> Bigbluebutton Settings
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('bbb.index')}}">
                        <i class="ni ni-single-02 text-yellow"></i> Bigbluebutton Packages
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('maintenance.index')}}">
                        <i class="ni ni-bullet-list-67 text-red"></i> Maintenance
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/users')}}">
                        <i class="ni ni-single-02 text-yellow"></i>Users
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('options.index')}}">
                        <i class="ni ni-key-25 text-info"></i> General Settings
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('development.index')}}">
                        <i class="fas fa-code text-info"></i> Development
                    </a>
                </li>
            </ul>
            <!-- Divider -->
            <hr class="my-3">
            <!-- Heading -->
            <h6 class="navbar-heading text-muted">Documentation</h6>
            <!-- Navigation -->
            <ul class="navbar-nav mb-md-3">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="ni ni-spaceship"></i> Getting started
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="ni ni-palette"></i> About Us
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="ni ni-ui-04"></i> contact Us
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>



{{--<!-- Main content -->--}}
{{--<div class="main-content">--}}
{{--  --}}
{{--</div>--}}
