<?php


namespace BBBController\Console\Shell;

 class ShellBase
{
    //systemctl show -p SubState --value apache2
     protected $command;
     protected $argument;
     public function __construct($command,$argument = '')
     {
         $this->command = $command;
         $this->argument = $argument;
     }
     protected function execute(){
         exec($this->command, $output);
         return $output;

     }

}