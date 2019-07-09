<?php

use Illuminate\Database\Seeder;
use App\Setting;
class SettingTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
                'mail' => 'mail@example.com',
                'phone' => '055-55-55',
                'facebook' => 'https://www.facebook.com/',
                'vk' => 'https://vk.com/',
                'instagram' => 'https://www.instagram.com/',
                'image' => 'slider.jpg',
                'title_hy' => "<p>Բարի գալուստ</p><p>Նոյի Երկիր</p>",
                'title_en' => "<p>Welcome to</p><p>Land of Noah</p>",
                'title_ru' => "<p>Добро пожаловать на</p><p>Землю Ноя</p>",
                'slug' => 'setting',
                'keywords' => '',
                'keywords_desc' => ''
            ]);
    }
}
