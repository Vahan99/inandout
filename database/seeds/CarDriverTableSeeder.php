<?php

use Illuminate\Database\Seeder;

class CarDriverTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('car_driver')->truncate();
        factory(\App\CarDriver::class, 100)->create();
    }
}
