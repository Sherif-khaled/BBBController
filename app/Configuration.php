<?php

namespace BBBController;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    protected $fillable = ['config_key','config_value'];

    public $timestamps = false;

    public function getSettings()
    {
        return Configuration::pluck('config_value', 'config_key')->toArray();
    }
}
