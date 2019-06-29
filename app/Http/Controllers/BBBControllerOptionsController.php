<?php

namespace BBBController\Http\Controllers;

use BBBController\CompanyActivity;
use BBBController\Configuration;
use BBBController\Country;
use Camroncade\Timezone\Timezone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class BBBControllerOptionsController extends Controller
{
    protected $brand_fields = [
        'company-name',
        'activity',
        'logo-path',
    ];

    protected static $general_fields = [
        'country',
        'timezone',
        'records-path'
    ];
    protected static $server_fields = [
        'sudo_username',
        'sudo_pass',
        'host',
        'username',
        'password',
        'key',
        'keyphrase',
        'root'
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

    public function save(Request $request)
    {

        if ($request->hasFile( 'logo-path' )) {
            $logo = $request->file( 'logo-path' );
            $name = 'logo';
            $destinationPath = public_path( '/assets/img/brand/' );
            $logo->move( $destinationPath, $name );

       }

//       if($request->hasFile('logo-path')){
//
//           $logo_path = $request->file('logo-path')->storeAs('/assets/img/brand','brand.' .$request->file('logo-path')->getClientOriginalExtension());
//       }


       if($request->has('brand_form')){

           $this->form( $this->brand_fields );

       }
       elseif ($request->has('general_form')){

           $this->form($this::$general_fields);

       }

        return response()->json( $request->file( 'logo-path' ) );

   }

    public function form($values)
    {

       $config = Configuration::all();

       if($config->count() == 0){

           foreach ($values as $value) {

               Configuration::insert( array("config_key" => $value, "config_value" => request( $value )) );

           }
       }
       else{

           foreach ($values as $value) {
               $val = request( $value );
               if ($value == 'logo-path') {

                   $logo = request()->file( 'logo-path' );
                   $val = '/assets/img/brand/logo.' . $logo->getClientOriginalExtension();
               }

               Configuration::Where( 'config_key', '=', $value )->update( array('config_value' => $val) );
               \config( array('bbbcontroller.brand.' . $value => request( $value )) );
//dd(\config('bbbcontroller.brand.company_name'));
           }
          // Artisan::call('cache');
           Artisan::call('config:cache');

       }
   }
}
