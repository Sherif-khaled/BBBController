<?php

use Illuminate\Database\Seeder;
use BBBController\Settings;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Configuration::insert([
            ["company_name" => "X2hex"],
            ["company_activity" => "Software Industry"],
            ["company_logo" => ""],
            ["country" => "Egypt"],
            ["timezone" => "Cairo"],
            ["record_path"]
        ]);
    }
}
