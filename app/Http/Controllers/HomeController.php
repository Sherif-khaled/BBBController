<?php

namespace BBBController\Http\Controllers;

use Illuminate\Contracts\Support\Renderable as RenderableAlias;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return RenderableAlias
     */
    public function index()
    {
        return view('home');
    }

}
