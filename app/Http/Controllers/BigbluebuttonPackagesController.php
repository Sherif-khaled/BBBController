<?php

namespace BBBController\Http\Controllers;

use Illuminate\Http\Request;

class BigbluebuttonPackagesController extends Controller
{
    public function index(){
        return view('bbb-settings.packages');
    }
}
