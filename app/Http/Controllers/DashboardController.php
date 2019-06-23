<?php

namespace BBBController\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index(){
        $ram = $this->get_server_memory_usage();
        $cpu = $this->get_server_cpu_usage();
        $hdd  = disk_free_space("/");
        return view('dashboard',compact('ram','cpu','hdd'));
    }
    function get_server_memory_usage(){

        $free = shell_exec('free');
        $free = (string)trim($free);
        $free_arr = explode("\n", $free);
        $mem = explode(" ", $free_arr[1]);
        $mem = array_filter($mem);
        $mem = array_merge($mem);
        $memory_usage = $mem[2]/$mem[1]*100;

        return $memory_usage;
    }
    function get_server_cpu_usage(){

        $load = sys_getloadavg();
        return $load[0];

    }
}
