<?php

namespace BBBController\Http\Controllers;

use BBBController\CompanyActivity;
use BBBController\Configuration;
use BBBController\Country;
use Camroncade\Timezone\Timezone;
use Illuminate\Http\JsonResponse;
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
    protected static $local_server_fields = [
        'server_enabled',
        'sudo_username',
        'sudo_password',
    ];
    protected static $remote_server_fields = [
        'server_enabled',
        'host_ip',
        'username',
        'password',
        'private_key',
        'key_phrase',
        'root_path'
    ];

   public function index(){
       //config(['bbbcontroller.country' => 'Egypt']);

       $timezone = new Timezone();

       $timezone_select = $timezone->selectForm(
           config('bbbController.general_settings.timezone') ?? 'UTC',
           'Select a timezone',
           ['class' => 'form-control', 'name' => 'timezone']
       );

       $countries = Country::all(['name']);

       $company_activities = CompanyActivity::all();

       $settings = config('bbbController');

       return view('bbb-controller.options', compact('timezone_select', 'countries', 'company_activities', 'settings'));
   }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function save(Request $request)
    {

        if ($request->hasFile( 'logo-path' )) {
            $logo = $request->file( 'logo-path' );
            $name = 'logo';
            $destinationPath = public_path( '/assets/img/brand/' );
            $logo->move( $destinationPath, $name );

       }

       if($request->has('brand_form')){

           $this->form( $this->brand_fields );

       }
       elseif ($request->has('general_form')){

           $this->form($this::$general_fields);

       } elseif ($request->has( 'server_form' )) {

           if ($request->server_form == 'localhost') {
               $this->form( $this::$local_server_fields );

           } elseif ($request->server_form == 'remote') {
               $this->form( $this::$remote_server_fields );

           }


       }

        return response()->json( array("success" => "Settings updated successfully") );

    }

    /**
     * @param $values
     */
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
                   $val = '/assets/img/brand/logo';
               }

               $config = Configuration::where( 'config_key', '=', $value );

               /** @var Configuration $config */
               if ($config->count() == 0) {

                   $config->insert( array("config_key" => $value, "config_value" => $val) );

               } else {

                   $config->update( array('config_value' => $val) );

                   config( array('bbbcontroller.brand.' . $value => request( $value )) );
               }

           }
          // Artisan::call('cache');
           Artisan::call('config:cache');

       }
   }
}
