<?php

use Illuminate\Database\Seeder;

class TourImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$tour_ids = App\Tour::all('id')->pluck('id')->toArray();
        foreach ($tour_ids as $id) {
        	App\TourImage::create([
    			'tour_id' => $id,
    			'image' => 'news-slider.jpg'
        	]);
        }
    }
}
