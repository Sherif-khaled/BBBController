<div class="row">
    <div class="col-md-12">
        <nav>
            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-general-tab" data-toggle="tab" href="#nav-general"
                   role="tab" aria-controls="nav-general" aria-selected="true">General</a>
                <a class="nav-item nav-link" id="nav-appearance-tab" data-toggle="tab" href="#nav-appearance" role="tab"
                   aria-controls="nav-appearance" aria-selected="false">Appearance</a>
                <a class="nav-item nav-link" id="nav-branding-tab" data-toggle="tab" href="#nav-branding" role="tab"
                   aria-controls="nav-branding" aria-selected="false">Branding</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-general" role="tabpanel" aria-labelledby="nav-general-tab">
                <div class="row">
                    <div class="col col-md-10">Audio Chat Notification</div>
                    <div class="col col-md-2">
                        <label id="chatNotificationSwitch" class="switch">
                            <input type="checkbox" id="chkChatNotification" name="chkChatNotification">
                            <span class="slider"></span>
                            <input type="hidden" id="chkChatNotificationHide" name="chkChatNotificationHide">
                        </label>
                    </div>
                </div>

                <div class="row">
                    <div class="col col-md-10">Show Participants On Login</div>
                    <div class="col col-md-2">
                        <label id="participantsOnLoginSwitch" class="switch">
                            <input type="checkbox" id="" name="chkParticipantsOnLogin">
                            <span class="slider"></span>
                            <input type="hidden" id="chkParticipantsOnLoginHide" name="chkParticipantsOnLoginHide">
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-md-10">Auto Join</div>
                    <div class="col col-md-2">
                        <label id="autoJoinSwitch" class="switch">
                            <input type="checkbox" id="" name="chkAutoJoin">
                            <span class="slider"></span>
                            <input type="hidden" id="chkAutoJoinHide" name="chkAutoJoinHide">
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-md-10">Listen Only Mode</div>
                    <div class="col col-md-2">
                        <label id="listenOnlyModeSwitch" class="switch">
                            <input type="checkbox" id="" name="chkListenOnlyMode">
                            <span class="slider"></span>
                            <input type="hidden" id="chkListenOnlyModeHide" name="chkListenOnlyModeHide">
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-md-10">Force Listen Only</div>
                    <div class="col col-md-2">
                        <label id="forceListenOnlySwitch" class="switch">
                            <input type="checkbox" id="" name="chkForceListenOnly">
                            <span class="slider"></span>
                            <input type="hidden" id="chkForceListenOnlyHide" name="chkForceListenOnlyHide">
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-md-10">Skip Check</div>
                    <div class="col col-md-2">
                        <label id="skipCheckSwitch" class="switch">
                            <input type="checkbox" id="" name="chkSkipCheck">
                            <span class="slider"></span>
                            <input type="hidden" id="chkSkipCheckHide" name="chkSkipCheckHide">
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-md-10">LockOn Join</div>
                    <div class="col col-md-2">
                        <label id="lockOnJoinSwitch" class="switch">
                            <input type="checkbox" id="" name="chkLockOnJoin">
                            <span class="slider"></span>
                            <input type="hidden" id="chkLockOnJoinHide" name="chkLockOnJoinHide">
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-md-10">Ask For Feedback On Logout</div>
                    <div class="col col-md-2">
                        <label id="feedbackSwitch" class="switch">
                            <input type="checkbox" id="" name="chkFeedback">
                            <span class="slider"></span>
                            <input type="hidden" id="chkFeedbackHide" name="chkFeedbackHide">
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-md-10">Allow User Lookup</div>
                    <div class="col col-md-2">
                        <label id="allowUserLookupSwitch" class="switch">
                            <input type="checkbox" id="" name="chkAllowUserLookup">
                            <span class="slider"></span>
                            <input type="hidden" id="chkAllowUserLookupHide" name="chkAllowUserLookupHide">
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-md-10">Enable Network Information</div>
                    <div class="col col-md-2">
                        <label id="enableNetworkInfoSwitch" class="switch">
                            <input type="checkbox" id="" name="chkEnableNetworkInfo">
                            <span class="slider"></span>
                            <input type="hidden" id="chkEnableNetworkInfoHide"
                                   name="chkEnableNetworkInfoHide">
                        </label>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="nav-appearance" role="tabpanel" aria-labelledby="nav-appearance-tab">
                <div class="form-group col-md-4">
                    <label for="mobileFontSize">Mobile font size</label>
                    <select id="mobileFontSize" name="mobileFontSize" class="form-control">
                        <option>8</option>
                        <option>10</option>
                        <option>12</option>
                        <option>14</option>
                        <option>16</option>
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="desktopFontSize">Desktop font size</label>
                    <select id="desktopFontSize" name="desktopFontSize" class="form-control">
                        <option>8</option>
                        <option>10</option>
                        <option>12</option>
                        <option>14</option>
                        <option>16</option>
                    </select>
                </div>

            </div>
            <div class="tab-pane fade" id="nav-branding" role="tabpanel" aria-labelledby="nav-branding-tab">
                <div class="form-group col-md-6">
                    <label for="applicationName">Application Name</label>
                    <input type="text" name="applicationName" class="form-control">

                </div>
                <div class="form-group col-md-6">
                    <label for="clientTitle">Client Title</label>
                    <input type="text" name="clientTitle" class="form-control">

                </div>
                <div class="form-group col-md-6">
                    <label for="copyright">Copyright</label>
                    <input type="text" name="copyright" class="form-control">

                </div>
                <div class="form-group col-md-6">
                    <label for="helpLink">Help Link</label>
                    <input type="text" name="helpLink" class="form-control">

                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .tab-content {
        background-color: white;
        padding: 3%;
    }

    .project-tab {
        padding: 10%;
        margin-top: -8%;
    }

    .project-tab #tabs {
        background: #007b5e;
        color: #eee;
    }

    .project-tab #tabs h6.section-title {
        color: #eee;
    }

    .project-tab #tabs .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
        color: #0062cc;
        background-color: transparent;
        border-color: transparent transparent #f3f3f3;
        border-bottom: 3px solid !important;
        font-size: 16px;
        font-weight: bold;
    }

    .project-tab .nav-link {
        border: 1px solid transparent;
        border-top-left-radius: .25rem;
        border-top-right-radius: .25rem;
        color: #0062cc;
        font-size: 16px;
        font-weight: 600;
    }

    .project-tab .nav-link:hover {
        border: none;
    }

    .project-tab thead {
        background: #f3f3f3;
        color: #333;
    }

    .project-tab a {
        text-decoration: none;
        color: #333;
        font-weight: 600;
    }

    .switch {
        transform: unset;
    }

    #desktopFontSize {
    }

    /*******************************************************/

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
            $('#chatNotificationSwitch').click(function () {
                if ($('#chkChatNotification').is(':checked')) {
                    $('#chkChatNotificationHide').val('true')
                } else if ($('#chkChatNotification').is(":not(:checked)")) {
                    $('#chkChatNotificationHide').val('false')
                }
            });
        })
    </script>
@endsection
