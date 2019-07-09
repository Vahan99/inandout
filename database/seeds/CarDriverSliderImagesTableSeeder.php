<?php

use Illuminate\Database\Seeder;

class CarDriverSliderImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $car_driver_ids = \App\CarDriver::all('id')->pluck('id')->toArray();
        foreach($car_driver_ids as $id) {
            \App\CarDriverSliderImage::create([
                'car_driver_id' => $id,
                'name' => 'car-slide.jpg'
            ]);
        }
    }
}
