<?php

namespace BBBController;

use Carbon\Carbon;
use Spatie\Permission\Models\Permission as PermissionAlias;

class Permission extends PermissionAlias
{
    public const UPDATED_AT = null;

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat( 'Y-m-d H:i:s', $date )->format( 'd-m-Y' );

    }
}
