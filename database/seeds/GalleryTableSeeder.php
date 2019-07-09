<?php

use Illuminate\Database\Seeder;

class GalleryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $galleries = [
            ['image' => '7599_1516699695.jpg', 'page' => 'vacancy'],
            ['image' => '3879_1516699695.jpg', 'page' => 'driver'],
            ['image' => '4778_1516699695.jpg', 'page' => 'service'],
            ['image' => 'hotel-bg.jpg',  'page' => 'hotel'],
            ['image' => 'hostel-bg.jpg',  'page' => 'hostel'],
            ['image' => 'apartment-bg.jpg',  'page' => 'apartment'],
            ['image' => 'sightseeing-places.jpg',  'page' => 'sightseeing-places'],
            ['image' => 'restaurants.jpg',  'page' => 'restaurants'],
            ['image' => 'news-gallery.jpg',  'page' => 'news'],
        ];

        foreach ($galleries as $item) {
            \App\Gallery::create([
                'image' => $item['image'],
                'page' => $item['page']
            ]);
        }
    }
}
