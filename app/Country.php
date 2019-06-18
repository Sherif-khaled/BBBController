<?php

namespace BBBController;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function user(){
        return $this->hasMany(User::class);
    }
}
