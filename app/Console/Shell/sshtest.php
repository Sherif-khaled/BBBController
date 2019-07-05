<?php
/**
 * Create By Sherif Khaled
 */


namespace BBBController\Console\Shell;
include base_path() . '/vendor/autoload.php';

class sshtest
{
    protected $host;
    protected $user;
    protected $password;
    protected $public_key;
    protected $private_key; //the key must be convert as openssl format

    public function __construct($host, $user)
    {
        $this->host = $host;
        $this->user = $user;
        $this->public_key = '/home/eng-sherif/Desktop/GC/pu_test.pub';
        $this->private_key = '/home/eng-sherif/Desktop/GC/pr_test';

    }

    public function connect()
    {

        $ssh = new  \phpseclib\Net\SSH2($this->host);
        $key = new  \phpseclib\Crypt\RSA();
        $key->loadKey(file_get_contents($this->private_key));
        if (!$ssh->login($this->user, $key)) {
            exit('Login Failed');
        }

        echo $ssh->exec('systemctl stop ufw & echo $!'); // (despite the previous command) outputs /home/username
    }

}