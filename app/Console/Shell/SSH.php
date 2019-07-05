<?php
/**
 * Create By Sherif Khaled
 */

namespace BBBController\Console\Shell;


class SSH
{
//$ssh = new SSH('34.73.146.199','root');
//$ssh->connect();
//$tt = $ssh->execute('ls');
    protected $host;
    protected $user;
    protected $password;
    protected $public_key;
    protected $private_key; //the key must be convert as openssl format
    protected $methods = array(
        'kex' => 'diffie-hellman-group1-sha1',
        'hostkey' => 'ssh-dss',
        'client_to_server' => array(
            'crypt' => '3des-cbc',
            'mac' => 'hmac-md5',
            'comp' => 'none'),
        'server_to_client' => array(
            'crypt' => '3des-cbc',
            'mac' => 'hmac-md5',
            'comp' => 'none'));
    protected $callbacks = array('disconnect' => 'ssh_disconnect');
    private $connection;

    public function __construct($host, $user)
    {
        $this->host = $host;
        $this->user = $user;
        $this->public_key = '/home/eng-sherif/Desktop/GC/pu_test.pub';
        $this->private_key = '/home/eng-sherif/Desktop/GC/pr_test';

    }

    function ssh_disconnect($reason, $message, $language)
    {
        printf("Server disconnected with reason code [%d] and message: %s\n", $reason, $message);
    }

    public function connect()
    {
        $this->connectToServer();
        $this->serverAuthentication();
    }

    private function connectToServer()
    {
        $this->connection = ssh2_connect($this->host, 22, array('hostkey' => 'ssh-rsa'), $this->methods);
        return $this->connection;
    }

    private function serverAuthentication()
    {
        if (!$this->connection) return 'Connection failed';

        $auth = ssh2_auth_pubkey_file($this->connection, $this->user, $this->public_key, $this->private_key, '');

        if (!$auth) {
            return 'Public Key Authentication Failed';
        }
        return true;
    }

    public function execute($cmd)
    {
        $stream = ssh2_shell($this->connection, $cmd);
        stream_set_blocking($stream, true);

        $stderr_stream = ssh2_fetch_stream($stream, SSH2_STREAM_STDIO);


        if (!$stream) {
            return false;
        }
        return $stderr_stream;

    }

}