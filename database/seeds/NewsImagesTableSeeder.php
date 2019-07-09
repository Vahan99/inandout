<?php

use Illuminate\Database\Seeder;

class NewsImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $news_ids = \App\News::all('id')->pluck('id')->toArray();
        foreach($news_ids as $id) {
            \App\NewsImage::create([
                'news_id' => $id,
                'image' => 'news-slider.jpg'
            ]);
        }
    }
}
