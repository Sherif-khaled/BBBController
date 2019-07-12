<?php


namespace BBBController\Operations\Bigbluebutton;


use BBBController\Operations\SSH;

class BigbluebuttonSettings
{
    protected $ssh;

    protected $files = [
        "freeswitch" => [
            "conference" => "/opt/freeswitch/etc/freeswitch/autoload_configs/conference.conf.xml",
            "conf-conference" => "/opt/freeswitch/conf/autoload_configs/conference.conf.xml",

        ],
        "bbb-web" => ["bigbluebutton" => "/usr/share/bbb-web/WEB-INF/classes/bigbluebutton.properties"],
        "client" => ["config" => "/var/www/bigbluebutton/client/conf/config.xml"],
    ];

    public function __construct()
    {
        $this->ssh = new SSH();
    }

    public function get_current_settings()
    {
        //Extract the shared secret

        //check if html5 is default

        //get the default presentation

        //get the current file size for an uploaded presentation

        //get the default landing page

    }

    //Bigbluebutton Settings
    public function change__shared_secret($salt)
    {

    }

    public function Change_default_presentation($localFile, $remoteFile)
    {

        $src = "~/$remoteFile";
        $dest = '/var/www/bigbluebutton-default/default.pdf';

//        if(is_null($pdf) || !is_string($pdf)){
//            throw new InvalidArgumentException( sprintf( "%s function only accepts string. Input was: %s", __FUNCTION__, $pdf ) );
//            return $pdf;
//        }
        $this->ssh->uploadFile( $localFile, 'default.pdf' );

        if ($this->ssh) {
            $this->ssh->connect();

            $this->ssh->execute( "mv $src $dest" );
        }
    }

    //Enable background music when only one person is in a session
    public function enable_background_music($value)
    {
        $old_value = '';
        $new_value = '';

        if ($value == true) {
            $this->changeValue( $old_value, $new_value, $this->files['freeswitch']['conference'] );
        } elseif ($value == false) {
            $this->changeValue( $new_value, $old_value, $this->files['freeswitch']['conference'] );
        }
    }
    //Turn off the “comfort noise” when no one is speaking
    public function turn_off__comfort_noise($value)
    {
        $old_value = '<param name="comfort-noise" value="true"/>';
        $new_value = '<param name="comfort-noise" value="false"/>';

        switch ($value) {
            case true:
                $this->changeValue($old_value, $new_value, $this->files['freeswitch']['conf-conference']);
                break;
            case false:
                $this->changeValue($new_value, $old_value, $this->files['freeswitch']['conf-conference']);
                break;
        }
    }

    //Increase the 200 page limit for uploads
    public function increase_page_limit()
    {

    }

    //Restrict webcam sharing to the presenter
    public function restrict_webcam_sharing($value)
    {
        $old_value = 'presenterShareOnly="false"';
        $new_value = 'presenterShareOnly="true"';

        switch ($value) {
            case true:
                $this->changeValue($old_value, $new_value, $this->files['client']['config']);
                break;
            case false:
                $this->changeValue($new_value, $old_value, $this->files['client']['config']);
                break;
        }
    }

    public function turn_off_you_are_now_muted($value)
    {
        $old_value = '<param name="muted-sound" value="conference/conf-muted.wav"/>';
        $new_value = '<!-- <param name="muted-sound" value="conference/conf-muted.wav"/> -->';

        switch ($value) {
            case true:
                $this->changeValue($old_value, $new_value, $this->files['freeswitch']['conference']);
                break;
            case false:
                $this->changeValue($new_value, $old_value, $this->files['freeswitch']['conference']);
                break;
        }
    }

    public function mute_all_users_on_startup($value)
    {
        $old_value = 'muteOnStart=false';
        $new_value = 'muteOnStart=true';

        switch ($value) {
            case true:
                $this->changeValue($old_value, $new_value, $this->files['bbb-web']['bigbluebutton']);
                break;
            case false:
                $this->changeValue($new_value, $old_value, $this->files['bbb-web']['bigbluebutton']);
                break;
        }
    }

    public function reduce_bandwidth_webcams()
    {

    }

    //HTML5 Settings

    public function change_udp_ports()
    {

    }

    public function make__html5_client_default()
    {

    }

    //Branding Settings

    public function increase_uploaded_presentation_file_size()
    {

    }

    public function change_landing_page($pdf)
    {

    }
    //Recording Settings

    //Change processing interval for recordingsA

    public function change_favicon($ico)
    {

    }

    public function change_processing_interval($interval)
    {

    }

    public function auto_start_recording()
    {

    }

    //General Settings

    public function allow_start_stop_recording()
    {

    }

    public function change_the_locale()
    {

    }

    private function changeValue($value, $replace, $file)
    {
        /** @var Exepression $exp */
        if ($value == null || $replace == null || $file == null) {
            throw new Exception(sprintf("%s Parameters Required", __FUNCTION__));
        }
        $exp = "sed -i 's|$value|$replace|g' $file";

        if ($this->ssh) {
            $this->ssh->connect();

            $this->ssh->execute($exp);
        }
    }


}