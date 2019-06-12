<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call([
            CompanyActivitiesTableSeeder::class,
            CountriesTableSeeder::class,
            SettingsTableSeeder::class,
        ]);

    }
}
