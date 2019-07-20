<?php

namespace BBBController\Http\Controllers {

    use BBBController\Operations\Bigbluebutton\BigbluebuttonSettings;
    use BBBController\Operations\Bigbluebutton\HTML5;
    use BBBController\Operations\SSH;
    use Illuminate\Http\Request;

    class BigbluebuttonSettingsController extends Controller
    {
        public function index()
        {
            return view( 'bbb-settings.settings' );
        }

        function changeSettings(Request $request)
        {

            $gg = '';
            if ($request->has( 'bigbluebutton_form' )) {

                $bbb = new BigbluebuttonSettings();

                if ($request->hasFile( 'presentation' )) {
                    $pdf = $request->file( 'presentation' );
                    $remoteDist = 'default.pdf';
                    $bbb->Change_default_presentation( $pdf->getPathname(), $remoteDist );
                }

                if ($request->get( 'chkMuteUsersHide' ) == 'true') {
                    $bbb->mute_all_users_on_startup( true );

                } elseif ($request->get( 'chkMuteUsersHide' ) == 'false') {
                    $bbb->mute_all_users_on_startup( false );
                }

                if ($request->get( 'chkEnableMusicHide' ) == 'true') {
                    $bbb->enable_background_music( true );

                } elseif ($request->get( 'chkEnableMusicHide' ) == 'false') {
                    $bbb->enable_background_music( false );
                }

                if ($request->get( 'chkComfortNoiceHide' ) == 'true') {
                    $bbb->turn_off__comfort_noise( true );

                } elseif ($request->get( 'chkComfortNoiceHide' ) == 'false') {
                    $bbb->turn_off__comfort_noise( false );
                }

                if ($request->get( 'chkMutedHide' ) == 'true') {
                    $bbb->turn_off_you_are_now_muted( true );

                } elseif ($request->get( 'chkMutedHide' ) == 'false') {
                    $bbb->turn_off_you_are_now_muted( false );
                }

                if ($request->get( 'chkRestrictWebcamHide' ) == 'true') {
                    $bbb->restrict_webcam_sharing( true );

                } elseif ($request->get( 'chkRestrictWebcamHide' ) == 'false') {
                    $bbb->restrict_webcam_sharing( false );
                }



            } elseif ($request->has( 'html5_form' )) {

                $html5 = new HTML5();

                $d=new SSH();
                if($d->connectionStatus());

                if ($request->get( 'chkChatNotificationHide' ) == 'true') {
                    $html5->enableAudioChatNotification( true );
                } elseif ($request->get( 'chkChatNotificationHide' ) == 'false') {
                    $html5->enableAudioChatNotification( false );
                }

                if ($request->get( 'chkParticipantsOnLoginHide' ) == 'true') {
                    $html5->showParticipantsOnLogin( true );
                } elseif ($request->get( 'chkParticipantsOnLoginHide' ) == 'false') {
                    $html5->showParticipantsOnLogin( false );
                }

                if ($request->get( 'chkAutoJoinHide' ) == 'true') {
                    $html5->autoJoin( true );
                } elseif ($request->get( 'chkAutoJoinHide' ) == 'false') {
                    $html5->autoJoin( false );
                }

                if ($request->get( 'chkListenOnlyModeHide' ) == 'true') {
                    $html5->listenOnlyMode( true );
                } elseif ($request->get( 'chkListenOnlyModeHide' ) == 'false') {
                    $html5->listenOnlyMode( false );
                }

                if ($request->get( 'chkForceListenOnlyHide' ) == 'true') {
                    $html5->forceListenOnly( true );
                } elseif ($request->get( 'chkForceListenOnlyHide' ) == 'false') {
                    $html5->forceListenOnly( false );
                }

                if ($request->get( 'chkSkipCheckHide' ) == 'true') {
                    $html5->skipCheck( true );
                } elseif ($request->get( 'chkSkipCheckHide' ) == 'false') {
                    $html5->skipCheck( false );
                }

                if ($request->get( 'chkLockOnJoinHide' ) == 'true') {
                    $html5->lockOnJoin( true );
                } elseif ($request->get( 'chkLockOnJoinHide' ) == 'false') {
                    $html5->lockOnJoin( false );
                }

                if ($request->get( 'chkFeedbackHide' ) == 'true') {
                    $html5->askForFeedbackOnLogout( true );
                } elseif ($request->get( 'chkFeedbackHide' ) == 'false') {
                    $html5->askForFeedbackOnLogout( false );
                }

                if ($request->get( 'chkAllowUserLookupHide' ) == 'true') {
                    $html5->allowUserLookup( true );
                } elseif ($request->get( 'chkAllowUserLookupHide' ) == 'false') {
                    $html5->allowUserLookup( false );
                }

                if ($request->get( 'chkEnableNetworkInfoHide' ) == 'true') {
                    $html5->enableNetworkInformation( true );
                } elseif ($request->get( 'chkEnableNetworkInfoHide' ) == 'false') {
                    $html5->enableNetworkInformation( false );
                }
            }
            return response()->json( $request->get( 'chkMuteUsersHide' ) );
        }

        public function html5Settings(Request $request)
        {
            if ($request->has( 'genera' )) {


            }
            return response()->json( 'dddddddddddddd' );
        }
    }
}
