@extends('layout.app')

@section('content')

            <div class="col">
                <div class="row">
                    <div class="col mb-3">

                        <div class="card">
                            <form id="frmProfile" name="frmProfile" class="form" action="" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="e-profile">

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="row d-flex flex-column flex-sm-row justify-content-between mb-3">
                                                    <div class="text-center text-sm-left mb-2 mb-sm-0">
                                                        <div class="col-md-4 imgUp">
                                                            <div class="imagePreview" style="width: 200px;">
                                                                <img src="{{asset('assets/img/admin.jpg')}}" class="img-thumbnail">
                                                            </div>
                                                            <label class="btn btn-primary" style="width: 200px">
                                                                <i class="fa fa-fw fa-camera"></i>

                                                                Upload<input name="image" type="file" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                                                            </label>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-4">

                                                <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">{{$user->name}}</h4>
                                                <p class="mb-0">Role Not Set</p>
                                            </div>
                                            <div class="text-right col-md-5">
                                                <div class="text-muted float-right"><small>Last Joined : Joined 09 Dec 2017</small></div>

                                            </div>

                                        </div>
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item"><a href="" class="active nav-link">Settings</a></li>
                                        </ul>
                                        <div class="tab-content pt-3">
                                            <div class="tab-pane active">
                                                {{--                                                helper to send form type--}}
                                                <input name="profile" hidden>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div hidden class="form-group">
                                                                    <input type="text" value="{{$user->id}}" name="user_id" id="user_id">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Full Name</label>
{{--                                                                    <input name="image" type="file" class="uploadFile img" value="Upload Photo">--}}

                                                                    <input class="form-control" type="text" name="name" placeholder="John Smith" value="{{$user->name}}" data-validation="length" data-validation-length="3-15"
                                                                           data-validation-error-msg="Between 3-15 chars">
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Gender</label>
                                                                    <select class="form-control" name="gender">
                                                                        @foreach($gender as $g)
                                                                            <option {{old('gender',$g)==$user->gender? 'selected':''}}  value="{{$g}}">{{$g}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Email</label>
                                                                    <input value="{{$user->email}}" class="form-control" type="email" id="email" name="email" placeholder="user@example.com" data-validation="required email emailexist">
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
                                                        <input class="btn btn-primary" type="submit" id="btn_save_profile" value="Save Changes">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>

                    <div class="col-12 col-md-3 mb-3">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="px-xl-3">
                                   <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" class="btn btn-block btn-secondary">
                                       <i class="fa fa-sign-out"></i>
                                       <span>Logout</span>
                                   </a>

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
                    <form name="frmChangePassword" id="frmChangePassword">
                        <div class="md-form mb-4" id="pass_block">
                            <label for="currentPassword">Current Password</label>
                            <input type="password" name="currentPassword" id="currentPassword" class="form-control" placeholder="Current password" data-validation="required length" data-validation-length="6-15">
                        </div>
                        <div class="md-form mb-4" id="pass_block">
                            <label for="newPassword">New Password</label>
                            <input type="password" name="newPassword" id="newPassword" class="form-control" placeholder="New password" data-validation="required length" data-validation-length="6-15">
                        </div>
                        <div class="md-form mb-4" id="pass_block">
                            <label for="confirmPassword">Confirm Password</label>
                            <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" placeholder="password" data-validation="confirmation">
                        </div>
                        <div class="row">
                            <div class="col d-flex" style="margin-left: 560px">
                                <input class="btn btn-primary" type="submit" value="Change Password">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
<script src="{{asset('assets/vendor/jquery/dist/jquery.min.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $(function() {
            $(document).on("change",".uploadFile", function(e)
            {
                var uploadFile = $(this);
                var files = !!this.files ? this.files : [];
                if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

                if (/^image/.test( files[0].type)){ // only image file
                    var reader = new FileReader(); // instance of the FileReader
                    reader.readAsDataURL(files[0]); // read the local file

                    reader.onloadend = function(){ // set image data as background of div
                        uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url("+this.result+")");
                    }
                }

            });
        });
    });
</script>
<style type="text/css">
    body{
        margin-top:20px;
        background:#f8f8f8
    }

    .imagePreview {
        width: 100%;
        height: 180px;
        background-position: center center;
        background:url(http://cliquecities.com/assets/no-image-e3699ae23f866f6cbdf8ba2443ee5c4e.jpg);
        background-color:#fff;
        background-size: cover;
        background-repeat:no-repeat;
        display: inline-block;
        box-shadow:0px -3px 6px 2px rgba(0,0,0,0.2);
    }
    .btn-primary
    {
        display:block;
        border-radius:0px;
        box-shadow:0px 4px 6px 2px rgba(0,0,0,0.2);
        margin-top:-5px;
    }
    .imgUp
    {
        margin-bottom:15px;
    }
    .del
    {
        position:absolute;
        top:0px;
        right:15px;
        width:30px;
        height:30px;
        text-align:center;
        line-height:30px;
        background-color:rgba(255,255,255,0.6);
        cursor:pointer;
    }
    .imgAdd
    {
        width:30px;
        height:30px;
        border-radius:50%;
        background-color:#4bd7ef;
        color:#fff;
        box-shadow:0px 0px 2px 1px rgba(0,0,0,0.2);
        text-align:center;
        line-height:30px;
        margin-top:0px;
        cursor:pointer;
        font-size:15px;
    }
</style>

