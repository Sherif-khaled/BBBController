<?php

namespace BBBController\Http\Middleware;

use Cache;
use Closure;
use BBBController\Configuration;
use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;

class ConfigurationMiddle
{
    public $settings;

    public function __construct(Configuration $settings)
    {
        $this->settings = $settings;
    }


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $settings = Cache::get('settings');
        if(empty($settings) === true){
            $settings = $this->settings->getSettings();
            Cache::forever('settings', $settings);
        }

        if(empty($settings) === false){
            config($settings);
        }

        return $next($request);
    }
}
