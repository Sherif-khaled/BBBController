<?php

namespace BBBController;

use Carbon\Carbon;
use Spatie\Permission\Models\Role as RoleAlias;

class Role extends RoleAlias
{
    public const UPDATED_AT = null;

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat( 'Y-m-d H:i:s', $date )->format( 'd-m-Y' );

    }
}
