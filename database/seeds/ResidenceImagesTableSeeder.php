<?php

use Illuminate\Database\Seeder;

class ResidenceImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $residence_ids = \App\Residence::all('id')->pluck('id')->toArray();
        foreach($residence_ids as $id) {
            \App\ResidenceImage::create([
                'residence_id' => $id,
                'image' => 'hotel-slider.jpg'
            ]);
        }
    }
}
