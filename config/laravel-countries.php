<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Countries.
 *
 * (c) Brian Faust <hello@basecode.sh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Eloquent Models
    |--------------------------------------------------------------------------
    */

    'models' => [

        /*
        |--------------------------------------------------------------------------
        | Country Model
        |--------------------------------------------------------------------------
        */

       'country' => Artisanry\Countries\Models\Country::class,

        /*
        |--------------------------------------------------------------------------
        | Currency Model
        |--------------------------------------------------------------------------
        */

       'currency' => Artisanry\Countries\Models\Currency::class,

        /*
        |--------------------------------------------------------------------------
        | Timezone Model
        |--------------------------------------------------------------------------
        */

       'timezone' => Artisanry\Countries\Models\Timezone::class,

        /*
        |--------------------------------------------------------------------------
        | Timezone Model
        |--------------------------------------------------------------------------
        */

       'taxrate' => Artisanry\Countries\Models\TaxRate::class,

    ],

];
