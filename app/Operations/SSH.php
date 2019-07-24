<?php
/**
 * Create By Sherif Khaled
 */


namespace BBBController\Operations;


include base_path() . '/vendor/autoload.php';

use BBBController\Operations\Base\Parameters;
use Exception;
use phpseclib\Crypt\RSA;
use phpseclib\Net\SFTP;
use phpseclib\Net\SSH2;

class SSH extends Parameters
{

    public static $SSH_Connection;
    public static $instances = 0;
    private static $paramaeter;

    public function __construct()
    {
        self::$instances++;

        parent::__construct();

        self::$paramaeter = $this->parameters;

        if ($this->server_type == "remote") {
            $this->host = $this->parameters->remote->host;

            $this->user = $this->parameters->remote->user;

            $this->password = $this->parameters->remote->password;

            $this->private_key = $this->parameters->remote->key;

        } elseif ($this->server_type == "localhost") {

            $this->user = $this->parameters->localhost->user;

            $this->password = $this->parameters->localhost->password;

        }

        self::$SSH_Connection = new SSH2( $this->parameters->remote->host);
        self::$SSH_Connection->setTimeout(1);

    }

    public function connect()
    {

        if ($this->parameters->remote->key !== null) {

            $key = new  RSA();

            $key->loadKey( file_get_contents( $this->parameters->remote->key ) );

            self::$SSH_Connection->login( $this->parameters->remote->user, $key );
        } elseif ($this->parameters->remote->key == null && $this->parameters->remote->password !== null) {


           self::$SSH_Connection->login( $this->parameters->remote->user, $this->parameters->remote->password );
        }


    }
    public static function  serverAlive()
    {
        exec(sprintf('ping -c 1 -W 5 %s', escapeshellarg(self::$paramaeter->remote->host)), $res, $rval);
        return $rval === 0 ? true : false;
    }

    public function checkSSHPort(){
        try{
            $fsock = @fsockopen($this->parameters->remote->host, 22, $errno, $errstr, 1);
            stream_set_blocking($fsock,false);

            if (!$fsock) {
                fclose($fsock);
                return false;
            } else {
                fclose($fsock);
                return true;
            }

        }catch (Exception $e) {
            return false;

        }
    }
    public static function isConnected(){

        if(!self::$SSH_Connection->isConnected()){
            return false;
        }
        return true;
    }
    public static function isAuthenticated(){

        if(!self::$SSH_Connection->isAuthenticated()){
            return false;
        }
        return true;
    }

    public function execute($cmd)
    {
        echo $this->SSH_Connection->exec( $cmd ); // (despite the previous command) outputs /home/username
    }

    public function uploadFile($localFile, $remoteFile)
    {
        $connection = 0;
        $sftp = new SFTP( $this->parameters->remote->host );

        if ($this->parameters->remote->key !== null) {

            $key = new  RSA();

            // $key->setPassword('Admin159#');

            $key->loadKey( file_get_contents( $this->parameters->remote->key ) );

            $connection = $sftp->login( $this->parameters->remote->user, $key );

        } elseif ($this->parameters->remote->key == null && $this->parameters->remote->password !== null) {

            $connection = $sftp->login( $this->parameters->remote->user, $this->parameters->remote->password );

        }

        if (!$connection) {
            exit( 'Login Failed' );
        }

        if (!$sftp->put( $remoteFile, $localFile, SFTP::SOURCE_LOCAL_FILE )) {
            return response()->json( $sftp->nlist() );
            exit( 'Upload Failed' );
        }

    }
    public function closeSession(){
        self::$SSH_Connection->disconnect();
    }


}