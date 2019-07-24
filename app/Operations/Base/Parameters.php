<?php


namespace BBBController\Operations\Base;

use phpDocumentor\Reflection\Types\Static_;
use stdClass;

class Parameters
{

    public $server_type;


    public function __construct()
    {
        $this->server_type = config( 'bbbController.server.server_enabled' );

        $this->parameters = new stdClass();

        $this->parameters->remote = new stdClass();

        $this->parameters->remote->host = config( 'bbbController.server.remote_server.host_ip' );

        $this->parameters->remote->user = config( 'bbbController.server.remote_server.username' );

        $this->parameters->remote->password = config( 'bbbController.server.remote_server.password' );

        $this->parameters->remote->key = config( 'bbbController.server.remote_server.private_key' );

        $this->parameters->remote->key_phrase = config( 'bbbController.server.remote_server.key_phrase' );

        $this->parameters->remote->root_path = config( 'bbbController.server.remote_server.root_path' );

        $this->parameters->localhost = new stdClass();

        $this->parameters->localhost->user = config( 'bbbController.server.localhost.sudo_username' );

        $this->parameters->localhost->password = config( 'bbbController.server.localhost.sudo_password' );

        return $this->parameters;


    }
}