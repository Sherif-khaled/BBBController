<?php

namespace BBBController\Http\Controllers;

use BBBController\Console\Shell\OSService;
use BBBController\Operations\Base\Commands;
use BBBController\Operations\SSH;
use BBBController\Service;
use Illuminate\Http\JsonResponse;

class DashboardController extends Controller
{
    function index(){


        $services = Service::all();

        return view('dashboard',compact('services'));
    }

    function getServicesStates()
    {
        $service_status = false;
        if (config( 'bbbController.server.server_enabled' ) == 'localhost') {


        } elseif (config( 'bbbController.server.server_enabled' ) == 'remote') {
            $ssh = new SSH();
            $cmd = new Commands( 'ufw' );
            $ssh->connect();
            $ssh->execute( $cmd->command->service->status );
            if ($ssh == "true") {
                $service_status = true;
            } elseif ($ssh == "false") {
                $service_status = false;
            }

        }
        return $service_status;
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
     * @return JsonResponse $json
     */
    public function changeStates($id){
        $service = Service::find($id);
        if (!empty($service)) {

            $service->enable = request()->enabled;
            request()->enabled == 1 ? $service->current_status = 'Running' : $service->current_status = 'Stopped';
            $process = new OSService($service->service_name);

            if (request()->enabled == 0) {
                if ($process->stop()) {
                    $service->save();
                }
            } elseif (request()->enabled == 1) {
                if ($process->start()) {
                    $service->save();
                }
            }
        }

        return response()->json(['success'=>'Service status changed successfully.']);
    }
    public function checkRemoteServer(){

        $alive =  SSH::serverAlive();
        if(!$alive){
            $msg = "Unable to connect to the remote server.";
           return response()->json(["not_responding" => $msg]);
        }

        $connected =  SSH::isConnected();
        if(!$connected){
            $msg = "SSH port 22 connection refused.";
            return response()->json(["port_refused" => $msg]);
        }

        $authenticated =  SSH::isAuthenticated();
        if(!$authenticated){
            $msg = "SSH connection authentication failure.";
            return response()->json(["authentication_failure" => $msg]);
        }
        $msg = "you are now connected to remote server successfully.";
        return response()->json(["success" => $msg]);

    }

}
