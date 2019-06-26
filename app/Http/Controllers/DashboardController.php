<?php

namespace BBBController\Http\Controllers;

use BBBController\Service;
use Illuminate\Http\Request;
use BBBController\Console\Shell\ShellBase;
class DashboardController extends Controller
{
    function index(){
        $services = Service::all();

        return view('dashboard',compact('services'));
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

    /**
     * Change Service Status [Enable - Disable]
     * @param $id service ID
     * @return json
     */
    public function changeStates($id){
        $service = Service::find($id);
        if (!empty($service)) {

            $service->enable = request()->enabled;
            request()->enabled == 1 ? $service->current_status = 'Running' : $service->current_status = 'Stopped';

        }
        $service->save();
        return response()->json(['success'=>'Service status changed successfully.']);
    }

}
