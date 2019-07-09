<?php

use Illuminate\Database\Seeder;

class TourTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\TourType::class, 10)->create();
    }
}
