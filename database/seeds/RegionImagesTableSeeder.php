<?php

use Illuminate\Database\Seeder;

class RegionImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $region_ids = \App\Region::all('id')->pluck('id')->toArray();
        foreach($region_ids as $id) {
            \App\RegionImage::create([
                'region_id' => $id,
                'image' => 'region.jpg'
            ]);
        }
    }
}
