<?php
/**
 * Create By Sherif Khaled
 */


namespace BBBController\Operations;


include base_path() . '/vendor/autoload.php';

use BBBController\Operations\Base\Parameters;
use phpseclib\Crypt\RSA;
use phpseclib\Net\SFTP;
use phpseclib\Net\SSH2;

class SSH extends Parameters
{

    private $SSH_Connection;

    public function __construct()
    {
        parent::__construct();

        if ($this->server_type == "remote") {
            $this->host = $this->parameters->remote->host;

            $this->user = $this->parameters->remote->user;

            $this->password = $this->parameters->remote->password;

            $this->private_key = $this->parameters->remote->key;

        } elseif ($this->server_type == "localhost") {

            $this->user = $this->parameters->localhost->user;

            $this->password = $this->parameters->localhost->password;

        }

    }

    public function connect()
    {
        $this->SSH_Connection = new SSH2( $this->parameters->remote->host );

        if ($this->parameters->remote->key !== null) {


            $key = new  RSA();

            $key->loadKey( file_get_contents( $this->parameters->remote->key ) );

            $this->SSH_Connection->login( $this->parameters->remote->user, $key );
        } elseif ($this->parameters->remote->key == null && $this->parameters->remote->password !== null) {


            $this->SSH_Connection->login( $this->parameters->remote->user, $this->parameters->remote->password );
        }


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

            $key->loadKey( file_get_contents( $this->parameters->remote->key ) );

            $connection = $sftp->login( $this->parameters->remote->user, $key );

        } elseif ($this->parameters->remote->key == null && $this->parameters->remote->password !== null) {

            $connection = $sftp->login( $this->parameters->remote->user, $this->parameters->remote->password );

        }

        if (!$connection) {
            exit( 'Login Failed' );
        }

        if (!$sftp->put( $remoteFile, $localFile, SFTP::SOURCE_LOCAL_FILE )) {
            print_r( $sftp->nlist() );
            exit( 'Upload Failed' );
        }


    }

}