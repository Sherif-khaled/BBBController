@extends('layout.app')

@section('content')

            <div class="col">
                <div class="row">
                    <div class="col mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="e-profile">
                                    <div class="row">
                                        <div class="col-12 col-sm-auto mb-3">
                                            <div class="mx-auto" style="width: 140px;">
                                                <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);">
                                                    <span style="color: rgb(166, 168, 170); font: bold 8pt Arial;">140x140</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                            <div class="text-center text-sm-left mb-2 mb-sm-0">
                                                <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">{{$user->name}}</h4>
                                                <p class="mb-0">Role Not Set</p>
                                                <div class="mt-2" style="padding-top: 25px">
                                                    <button class="btn btn-primary" type="button">
                                                        <i class="fa fa-fw fa-camera"></i>
                                                        <span>Change Photo</span>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="text-center text-sm-right">
                                                <span class="badge badge-secondary">administrator</span>
                                                <div class="text-muted"><small>Joined 09 Dec 2017</small></div>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a href="" class="active nav-link">Settings</a></li>
                                    </ul>
                                    <div class="tab-content pt-3">
                                        <div class="tab-pane active">
                                            <form id="frmProfile" class="form" action="">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div hidden class="form-group">
                                                                    <input type="text" value="{{$user->id}}" name="user_id" id="user_id">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Full Name</label>
                                                                    <input class="form-control" type="text" name="name" placeholder="John Smith" value="{{$user->name}}" data-validation="length" data-validation-length="3-15"
                                                                           data-validation-error-msg="Between 3-15 chars">
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Gender</label>
                                                                    <select class="form-control" name="gender">
                                                                        <option selected="{{$user->gender}}">Male</option>
                                                                        <option selected="{{$user->gender}}">Female</option>
                                                                        <option selected="{{$user->gender}}">Other</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Email</label>
                                                                    <input value="{{$user->email}}" class="form-control" type="email" name="email" placeholder="user@example.com" data-validation="required email emailexist">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col mb-3">
                                                                <div class="form-group">
                                                                    <label>Country</label>
                                                                    <select class="form-control" name="country">
                                                                        @foreach($countries as $country)
                                                                            <option {{old('job_status',$country->id)==$user->country_id? 'selected':''}}  value="{{$country->id}}">{{$country->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col d-flex justify-content-end">
                                                        <button class="btn btn-primary" type="button" id="btn_save_profile">Save Changes</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-3 mb-3">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="px-xl-3">
                                    <button class="btn btn-block btn-secondary">
                                        <i class="fa fa-sign-out"></i>
                                        <span>Logout</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title font-weight-bold">Support</h6>
                                <p class="card-text">Get fast, free help from our friendly assistants.</p>
                                <button type="button" class="btn btn-primary">Contact Us</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
{{--************************************************************************--}}
    <div style="width: 810px; padding-left:40px">
        <div class="card">
            <div class="card-header">
                <div class="card-title"><h3>Change Password</h3></div>
            </div>
            <div class="card-body justify-content-center"  >
                <div class="col-8">
                    <form>
                        <div class="md-form mb-4" id="pass_block">
                            <label for="password">Current Password</label>
                            <input type="password" name="c_password" id="password" class="form-control" placeholder="Current password" data-validation="required length" data-validation-length="6-15">
                        </div>
                        <div class="md-form mb-4" id="pass_block">
                            <label for="pass">New Password</label>
                            <input type="password" name="pass" id="pass" class="form-control" placeholder="New password" data-validation="required length" data-validation-length="6-15">
                        </div>
                        <div class="md-form mb-4" id="pass_block">
                            <label for="pass_confirmation">Confirm Password</label>
                            <input type="password" name="pass_confirmation" id="pass_confirmation" class="form-control" placeholder="password" data-validation="confirmation">
                        </div>
                        <div class="row">
                            <div class="col d-flex" style="margin-left: 560px">
                                <button class="btn btn-primary" type="submit">Save Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

<style type="text/css">
    body{
        margin-top:20px;
        background:#f8f8f8
    }
</style>