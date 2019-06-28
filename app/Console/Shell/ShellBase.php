<?php

namespace BBBController\Console\Shell;

 class ShellBase
{
     protected $command;
     protected $argument;
     private $pid;

     protected function execute(){
         exec($this->command, $pid);
         $this->pid = $pid;
         return $this->pid;
     }


 }