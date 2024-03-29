<?php

namespace Database\Seeders;

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
        $this->call([
            UserSeeder::class,
            ProcessingPlaceSeeder::class,
            RequestTypeSeeder::class,
            ProvinceSeeder::class,
            DistrictSeeder::class,
            WardSeeder::class,
        ]);
    }
}
