
<?php

use Illuminate\Database\Seeder;

class TruncateTablesSeeder extends Seeder
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
        DB::table('car_driver_slider_images')->truncate();
        DB::table('gallery')->truncate();
        DB::table('news')->truncate();
        DB::table('pages')->truncate();
        DB::table('region_images')->truncate();
        DB::table('regions')->truncate();
        DB::table('residence_images')->truncate();
        DB::table('residences')->truncate();
        DB::table('restaurant_images')->truncate();
        DB::table('restaurants')->truncate();
        DB::table('room_types')->truncate();
        DB::table('services')->truncate();
        DB::table('setting')->truncate();
        DB::table('teams')->truncate();
        DB::table('tour_images')->truncate();
        DB::table('tour_types')->truncate();
        DB::table('tours')->truncate();
        DB::table('users')->truncate();
        DB::table('vacancy')->truncate();
        DB::table('vehicle_types')->truncate();
        DB::table('news')->truncate();
        DB::table('news_images')->truncate();
        DB::table('currencies')->truncate();
    }
}
