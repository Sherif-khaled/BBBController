<?php

namespace BBBController;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, string $string1, $value)
 * @method count()
 */
class Configuration extends Model
{
    protected $fillable = ['config_key','config_value'];

    public $timestamps = false;

    public function getSettings()
    {
        return Configuration::pluck('config_value', 'config_key')->toArray();
    }
}
