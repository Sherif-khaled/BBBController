<?php

namespace BBBController\Http\Controllers;

use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    public function index(){
        return view('maintenance.maintenance');
    }
}
