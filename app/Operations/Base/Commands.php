<?php


namespace BBBController\Operations\Base;

use stdClass;


class Commands
{


    public $command;
    /**
     * @var
     */
    private $cmd;


    public function __construct($cmd = "")
    {
        $this->cmd = $cmd;

        $this->command = new stdClass();

        $this->command->service = new stdClass();

        $this->command->service->start = "systemctl start $this->cmd";

        $this->command->service->stop = "systemctl stop $this->cmd";

        $this->command->service->status = "systemctl status $this->cmd > /dev/null && echo true || echo false";


        //$this->command->service->status = "systemctl status $this->cmd > /dev/null 2>&1 & echo $!";
        //$this->command->service->status = "pidof $this->cmd >/dev/null && echo true || echo false";


        $this->command->os = new stdClass();

        $this->command->os->ram = new stdClass();

        $this->command->os->ram->free = "";

        $this->command->os->ram->usage = "";

        return $this->command;
    }

}