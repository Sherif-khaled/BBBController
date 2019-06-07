<?php

use Illuminate\Database\Seeder;
use BBBController\CompanyActivity;
class CompanyActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CompanyActivity::insert([
            ['activity' => 'Educational Institute'],
            ['activity' => 'Information Technology'],
            ['activity' => 'Software Industry'],
            ['activity' => 'Other services'],

        ]);
    }
}
