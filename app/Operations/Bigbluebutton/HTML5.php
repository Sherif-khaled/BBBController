<?php


namespace BBBController\Operations\Bigbluebutton;

class HTML5 extends BigbluebuttonSettings
{
    protected $files = [
        "config" => "/usr/share/meteor/bundle/programs/server/assets/app/config/settings.yml",
    ];

    public function __construct()
    {
        parent::__construct();
    }

    public function enableAudioChatNotification($value)
    {
        $old_value = 'audioChatNotification: false';
        $new_value = 'audioChatNotification: true';

        switch ($value) {
            case true:
                $this->changeValue( $old_value, $new_value, $this->files['config'] );
                break;
            case false:
                $this->changeValue( $new_value, $old_value, $this->files['config'] );
                break;
        }
    }

    public function showParticipantsOnLogin($value)
    {
        $old_value = 'showParticipantsOnLogin: true';
        $new_value = 'showParticipantsOnLogin: false';

        switch ($value) {
            case true:
                $this->changeValue( $old_value, $new_value, $this->files['config'] );
                break;
            case false:
                $this->changeValue( $new_value, $old_value, $this->files['config'] );
                break;
        }
    }

    public function autoJoin($value)
    {
        $old_value = 'autoJoin: true';
        $new_value = 'autoJoin: false';

        switch ($value) {
            case true:
                $this->changeValue( $old_value, $new_value, $this->files['config'] );
                break;
            case false:
                $this->changeValue( $new_value, $old_value, $this->files['config'] );
                break;
        }
    }

    public function listenOnlyMode($value)
    {
        $old_value = 'listenOnlyMode: true';
        $new_value = 'listenOnlyMode: false';

        switch ($value) {
            case true:
                $this->changeValue( $old_value, $new_value, $this->files['config'] );
                break;
            case false:
                $this->changeValue( $new_value, $old_value, $this->files['config'] );
                break;
        }
    }

    public function forceListenOnly($value)
    {
        $old_value = 'forceListenOnly: false';
        $new_value = 'forceListenOnly: true';

        switch ($value) {
            case true:
                $this->changeValue( $old_value, $new_value, $this->files['config'] );
                break;
            case false:
                $this->changeValue( $new_value, $old_value, $this->files['config'] );
                break;
        }
    }

    public function skipCheck($value)
    {
        $old_value = 'skipCheck: false';
        $new_value = 'skipCheck: true';

        switch ($value) {
            case true:
                $this->changeValue( $old_value, $new_value, $this->files['config'] );
                break;
            case false:
                $this->changeValue( $new_value, $old_value, $this->files['config'] );
                break;
        }
    }

    public function lockOnJoin($value)
    {
        $old_value = 'lockOnJoin: true';
        $new_value = 'lockOnJoin: false';

        switch ($value) {
            case true:
                $this->changeValue( $old_value, $new_value, $this->files['config'] );
                break;
            case false:
                $this->changeValue( $new_value, $old_value, $this->files['config'] );
                break;
        }
    }

    public function askForFeedbackOnLogout($value)
    {
        $old_value = 'askForFeedbackOnLogout: true';
        $new_value = 'askForFeedbackOnLogout: false';

        switch ($value) {
            case true:
                $this->changeValue( $old_value, $new_value, $this->files['config'] );
                break;
            case false:
                $this->changeValue( $new_value, $old_value, $this->files['config'] );
                break;
        }
    }

    public function allowUserLookup($value)
    {
        $old_value = 'allowUserLookup: false';
        $new_value = 'allowUserLookup: true';

        switch ($value) {
            case true:
                $this->changeValue( $old_value, $new_value, $this->files['config'] );
                break;
            case false:
                $this->changeValue( $new_value, $old_value, $this->files['config'] );
                break;
        }
    }

    public function enableNetworkInformation($value)
    {
        $old_value = 'enableNetworkInformation: false';
        $new_value = 'enableNetworkInformation: true';

        switch ($value) {
            case true:
                $this->changeValue( $old_value, $new_value, $this->files['config'] );
                break;
            case false:
                $this->changeValue( $new_value, $old_value, $this->files['config'] );
                break;
        }
    }

    public function changeMobileFontSize($old, $new)
    {
        $old_value = "mobileFontSize: $old" . "px";
        $new_value = "mobileFontSize: $new" . "px";

        $this->changeValue( $old_value, $new_value, $this->files['config'] );

    }

    public function changeDesktopFontSize($old, $new)
    {
        $old_value = "desktopFontSize: $old" . "px";
        $new_value = "desktopFontSize: $new" . "px";

        $this->changeValue( $old_value, $new_value, $this->files['config'] );
    }

    public function applicationName($old, $new)
    {
        $old_value = "appName: $old";
        $new_value = "appName: $new";

        $this->changeValue( $old_value, $new_value, $this->files['config'] );
    }

    public function clientTitle($old, $new)
    {
        $old_value = "clientTitle: $old";
        $new_value = "clientTitle: $new";

        $this->changeValue( $old_value, $new_value, $this->files['config'] );
    }

    public function copyright($old, $new)
    {
        $old_value = "copyright: $old";
        $new_value = "copyright: $new";

        $this->changeValue( $old_value, $new_value, $this->files['config'] );
    }

    public function helpLink($old, $new)
    {
        $old_value = "helpLink: $old";
        $new_value = "helpLink: $new";

        $this->changeValue( $old_value, $new_value, $this->files['config'] );
    }

}