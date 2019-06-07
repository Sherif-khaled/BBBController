<?php

namespace BBBController\Http\Controllers;

use Illuminate\Http\Request;

class BigbluebuttonSettingsController extends Controller
{
    public function index(){
        return view('bbb-settings.settings');
    }
}
