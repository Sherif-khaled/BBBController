<?php
/**
 * Create By Sherif Khaled
 */

namespace BBBController\Console\Shell;

class OSService extends ShellBase
{
    protected $service;

    public function __construct($service)
    {
        $this->service = $service;

    }

    public function start()
    {
        $exec = "echo 16121987 | /usr/bin/sudo -S sudo systemctl start " . $this->service . "& echo $!";
        $this->command = $exec;
        $pid = $this->execute();
        return $this->processStatus($pid);
    }

    private function processStatus($pid)
    {
        if (count($pid) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function stop()
    {
        $exec = "echo 16121987 | /usr/bin/sudo -S sudo systemctl stop " . $this->service . "& echo $!";
        $this->command = $exec;
        $pid = $this->execute();
        $kill = "echo 16121987 | /usr/bin/sudo -S sudo kill -9 $pid[0]";
        $this->command = $kill;
        $status = $this->execute();
        return $this->processStatus($status);
    }

    public function restart()
    {
        $exec = "echo 16121987 | /usr/bin/sudo -S sudo systemctl restart " . $this->service;
        $this->command = $exec;
        $this->execute();
    }

    public function status()
    {
        $this->command = "systemctl status " . $this->service;
        $this->execute();
    }
}