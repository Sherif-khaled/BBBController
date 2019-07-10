<form id="bigbluebuttonfrm" role="form" name="bigbluebuttonfrm" enctype="multipart/form-data">
    @csrf()
    <input type="hidden" name="bigbluebutton_form">
    <div class="card">
        <div class="card-header bg-dark">
            Server Settings
        </div>
        <div class="card-body">

            <div class="form-group col col-md-8">
                <label for="shared-secret">Shared secret</label>
                <input type="text" name="shared-secret" class="form-control" id="shared-secret"
                       aria-describedby="sharedHelp"
                       placeholder="Shared secret" value="">
            </div>
            <div>
                Mute all users on startup
                <label id="muteUsersSwitch" class="switch">
                    <input type="checkbox" id="chkMuteUsers" name="chkMuteUsers">
                    <span class="slider"></span>
                    <input type="hidden" id="chkMuteUsersHide" name="chkMuteUsersHide">

                </label>
            </div>
            <div>
                Enable background music when only one person is in a session
                <label id="enableMusicSwitch" class="switch">
                    <input type="checkbox" id="chkEnableMusic" name="chkEnableMusic">
                    <span class="slider"></span>
                    <input type="hidden" id="chkEnableMusicHide" name="chkEnableMusicHide">

                </label>
            </div>
            <div>
                Turn off the “comfort noise” when no one is speaking
                <label id="comfortNoiceSwitch" class="switch">
                    <input type="checkbox" id="chkComfortNoice" name="chkComfortNoice">
                    <span class="slider"></span>
                    <input type="hidden" id="chkComfortNoiceHide" name="chkComfortNoiceHide">

                </label>
            </div>
            <div>
                Turn off “you are now muted”
                <label id="mutedSwitch" class="switch">
                    <input type="checkbox" id="chkMuted" name="chkMuted">
                    <span class="slider"></span>
                    <input type="hidden" id="chkMutedHide" name="chkMutedHide">

                </label>
            </div>
            <div>
                Restrict webcam sharing to the presenter
                <label id="restrictWebcamSwitch" class="switch">
                    <input type="checkbox" id="chkRestrictWebcam" name="chkRestrictWebcam">
                    <span class="slider"></span>
                    <input type="hidden" id="chkRestrictWebcamHide" name="chkRestrictWebcamdHide">

                </label>
            </div>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-header bg-dark">
            Branding Settings
        </div>
        <div class="card-body">
            <div class="form-group col col-md-8">
                <label>FavIcon</label>
                <div class="input-group">
            <span class="input-group-btn">
                <span class="btn btn-default btn-file">
                    Browse… <input type="file" id="favicon" name="favicon">
                </span>
            </span>
                    <input type="text" name="favicon" class="form-control" readonly>
                </div>
            </div>

            <div class="form-group col col-md-8">
                <label>Presentation File</label>
                <div class="input-group">
            <span class="input-group-btn">
                <span class="btn btn-default btn-file">
                    Browse… <input type="file" id="presentation" name="presentation">
                </span>
            </span>
                    <input type="text" name="presentation" class="form-control" readonly>
                </div>
            </div>

            <div class="form-group col col-md-8">
                <label>Landing Page</label>
                <div class="input-group">
            <span class="input-group-btn">
                <span class="btn btn-default btn-file">
                    Browse… <input type="file" id="landingPage" name="landingPage">
                </span>
            </span>
                    <input type="text" name="landingPage" class="form-control" readonly>
                </div>
            </div>

        </div>
    </div>


    <button type="submit" class="btn btn-primary">Save Settings</button>
</form>


<style>

    .switch input {
        display: none;
    }

    .switch {
        display: inline-block;
        width: 60px;
        height: 30px;
        margin: 8px;
        transform: translateY(50%);
        position: relative;
    }

    #muteUsersSwitch {
        left: 61%;
        position: relative;
    }

    #comfortNoiceSwitch {
        left: 30%;
        position: relative;
    }

    #mutedSwitch {
        left: 57%;
        position: relative;
    }

    #enableMusicSwitch {
        left: 17%;
        position: relative;
    }

    #restrictWebcamSwitch {
        left: 43%;
        position: relative;
    }

    .slider {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        border-radius: 30px;
        box-shadow: 0 0 0 2px #777, 0 0 4px #777;
        cursor: pointer;
        border: 4px solid transparent;
        overflow: hidden;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        width: 100%;
        height: 100%;
        background: #777;
        border-radius: 30px;
        transform: translateX(-30px);
        transition: .4s;
    }

    input:checked + .slider:before {
        transform: translateX(30px);
        background: limeGreen;
    }

    input:checked + .slider {
        box-shadow: 0 0 0 2px limeGreen, 0 0 2px limeGreen;
    }


    /**************************/
    .bg-dark {
        background-color: #515151 !important;
    }

    .card-header {
        color: white;
    }

    .btn-file {
        position: relative;
        overflow: hidden;
    }

    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }
</style>
@section('script')
    <script>
        $(document).ready(function () {

            $('#mutedSwitch').click(function () {
                if ($('#chkMuted').is(':checked')) {
                    $('#chkMutedHide').val('true')
                } else if ($('#chkMuted').is(":not(:checked)")) {
                    $('#chkMutedHide').val('false')
                }
            });
            $('#muteUsersSwitch').click(function () {
                if ($('#chkMuteUsers').is(':checked')) {
                    $('#chkMuteUsersHide').val('true')
                } else if ($('#chkMuteUsers').is(":not(:checked)")) {
                    $('#chkMuteUsersHide').val('false')
                }
            });
            $('#enableMusicSwitch').click(function () {
                if ($('#chkEnableMusic').is(':checked')) {
                    $('#chkEnableMusicHide').val('true')
                } else if ($('#chkEnableMusic').is(":not(:checked)")) {
                    $('#chkEnableMusicHide').val('false')
                }
            });
            $('#comfortNoiceSwitch').click(function () {
                if ($('#chkComfortNoice').is(':checked')) {
                    $('#chkComfortNoiceHide').val('true')
                } else if ($('#chkComfortNoice').is(":not(:checked)")) {
                    $('#chkComfortNoiceHide').val('false')
                }
            });
            $('#restrictWebcamSwitch').click(function () {
                if ($('#chkRestrictWebcam').is(':checked')) {
                    $('#chkRestrictWebcamHide').val('true')
                } else if ($('#chkRestrictWebcam').is(":not(:checked)")) {
                    $('#chkRestrictWebcamHide').val('false')
                }
            });
            // *************
            $(document).on('change', '.btn-file :file', function () {
                let input = $(this),
                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                input.trigger('fileselect', [label]);
            });

            $('.btn-file :file').on('fileselect', function (event, label) {

                let input = $(this).parents('.input-group').find(':text'),
                    log = label;

                if (input.length) {
                    input.val(log);
                } else {
                    if (log) alert(log);
                }

            });

            function readURL(input) {
                if (input.files && input.files[0]) {
                    let reader = new FileReader();

                    reader.onload = function (e) {
                        $('#img-upload').attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#logo-path").change(function () {
                readURL(this);
            });
        });
    </script>
@endsection