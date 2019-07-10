<?php

namespace BBBController\Http\Controllers;

use BBBController\Operations\Bigbluebutton\BigbluebuttonSettings;
use Illuminate\Http\Request;

class BigbluebuttonSettingsController extends Controller
{
    public function index(){
        return view('bbb-settings.settings');
    }

    function changeBranding(Request $request)
    {
        if ($request->has( 'bigbluebutton_form' )) {

            $bbb = new BigbluebuttonSettings();

            if ($request->hasFile( 'presentation' )) {
                $pdf = $request->file( 'presentation' );
                $remoteDist = 'default.pdf';
                $bbb->Change_default_presentation( $pdf->getPathname(), $remoteDist );
            }
            if ($request->get( 'chkMutedHide' ) == 'true') {
                $bbb->turn_off_you_are_now_muted( true );

            } elseif ($request->get( 'chkMutedHide' ) == 'false') {
                $bbb->turn_off_you_are_now_muted( false );
            }
            if ($request->get( 'chkMuteUsersHide' ) == 'true') {
                $bbb->mute_all_users_on_startup( true );

            } elseif ($request->get( 'chkMuteUsersHide' ) == 'false') {
                $bbb->mute_all_users_on_startup( false );
            }

        }
        return response()->json( $request->get( 'chkMutedHide' ) );
    }
}
