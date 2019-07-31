<?php

namespace BBBController\Providers;

use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use BBBController\Configuration;
use BBBController\Operations\Commands;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
            Schema::defaultStringLength(191);

        if ($this->app->environment() !== 'production') {
            $this->app->register(IdeHelperServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {


        $configuration = Configuration::all(['config_key', 'config_value'])->keyBy('config_key')->transform(function ($settings) {
            return $settings->config_value;
        });

        $branding = [
            'company-name' => $configuration->has('company-name') ? $configuration['company-name'] : null,
            'activity' => $configuration->has('activity') ? $configuration['activity'] : null,
            'logo-path' => $configuration->has('logo-path') ? $configuration['logo-path'] : null
        ];
        $server = ['server_enabled' => $configuration->has('server_enabled') ? $configuration['server_enabled'] : 'localhost',
            'localhost' => [
                'sudo_username' => $configuration->has('sudo_username') ? $configuration['sudo_username'] : null,
                'sudo_password' => $configuration->has('sudo_password') ? $configuration['sudo_password'] : null],
            'remote_server' => ['host_ip' => $configuration->has('host_ip') ? $configuration['host_ip'] : null,
                'username' => $configuration->has('username') ? $configuration['username'] : null,
                'password' => $configuration->has('password') ? $configuration['password'] : null,
                'private_key' => $configuration->has('private_key') ? $configuration['private_key'] : null,
                'key_phrase' => $configuration->has('key_phrase') ? $configuration['key_phrase'] : null,
                'root_path' => $configuration->has('root_path') ? $configuration['root_path'] : null]
        ];
        $general_settings = ['country' => $configuration->has('country') ? $configuration['country'] : null,
            'timezone' => $configuration->has('timezone') ? $configuration['timezone'] : null,
            'records-path' => $configuration->has('records-path') ? $configuration['records-path'] : null];

        config(['bbbController' => [
            'branding' => $branding,
            'server' => $server,
            'general_settings' => $general_settings
        ]]);

//        if(SSH::$instances == 0){
//            $ssh = new SSH();
//            if(SSH::serverAlive()){
//                $ssh->connect();
//            }
//        }

    }
}
