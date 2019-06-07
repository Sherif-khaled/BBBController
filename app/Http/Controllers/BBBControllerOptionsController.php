<?php

namespace BBBController\Http\Controllers;

use BBBController\CompanyActivity;
use BBBController\Configuration;
use BBBController\Country;
use Camroncade\Timezone\Timezone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\Config;
use BBBController\Http\Requests\ConfigurationRequest;

class BBBControllerOptionsController extends Controller
{
    protected static $brand_fields = [
        'company-name',
        'activity',
        'logo-path',
    ];

    protected static $general_fields = [
        'country',
        'timezone',
    ];

   public function index(){
       //config(['bbbcontroller.country' => 'Egypt']);

       $timezone = new Timezone();

       $timezone_select = $timezone->selectForm(
           'UTC',
           'Select a timezone',
           ['class' => 'form-control', 'name' => 'timezone']
       );

       $countries = Country::all(['name']);

       $company_activities = CompanyActivity::all();

       return view('bbb-controller.options',compact('timezone_select','countries','company_activities'));
   }
   public function save(ConfigurationRequest $request){

       if($request->hasFile('logo-path')){

           $logo_path = $request->file('logo-path')->storeAs('images','brand.' .$request->file('logo-path')->getClientOriginalExtension());
       }


       if($request->has('brand_form')){

           $this->form($this::$brand_fields);

       }
       elseif ($request->has('general_form')){

           $this->form($this::$general_fields);

       }

       return redirect('/options')->with('success','The settings has been saved successfully');

   }
   private function form($keys){

       $config = Configuration::all();

       if($config->count() == 0){

           foreach ($keys as $key){

               Configuration::insert(["config_key" => $key,"config_value" => request($key)]);

           }
       }
       else{

           foreach ($keys as $key){

               Configuration::Where('config_key', '=', $key)->update(['config_value' => request($key)]);
               \config(['bbbcontroller.brand.' . $key => request($key)]);
//dd(\config('bbbcontroller.brand.company_name'));
           }
          // Artisan::call('cache');
           Artisan::call('config:cache');

       }
   }
}
