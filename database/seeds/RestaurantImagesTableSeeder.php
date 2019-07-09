<?php

use Illuminate\Database\Seeder;

class RestaurantImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurant_ids = \App\Restaurant::all('id')->pluck('id')->toArray();
        foreach ($restaurant_ids as $id) {
            \App\RestaurantImage::create([
                'restaurant_id' => $id,
                'image' => 'news-slider.jpg'
            ]);
        }
    }
}
