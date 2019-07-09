<?php

use Illuminate\Database\Seeder;
use App\Page;
class PageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contactInfo = "<h3>CONTACT INFO</h3><p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum</p>;</p><h4>ADDRESS</h4><p>795 Fake Ave, Door 6<br />Wonderland, CA 94107, USA<br /><a href='#'>info@yourdomain.com</a></p><h4>PHONE</h4><p>+440 875369208<br />+440 353363114</p>";
        $map = "<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6098.196134089778!2d44.481089174332475!3d40.16237021679043!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x406abc3777e25589%3A0x40090c0ff0f33b22!2sKoghb%2C+Yerevan%2C+Armenia!5e0!3m2!1sen!2s!4v1518876040027\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>";
        Page::create([
                'images' => 'armenia1.jpg',
                'name_hy' => 'Հայաստանի մասին',
                'name_en' => 'About Armenian',
                'name_ru' => 'Про Армению',
                'text_hy' => 'text',
                'text_en' => 'text',
                'text_ru' => 'text',
                'slug' => 'aboutarm',
                'data' => 'uiui'
            ]);
       
        Page::create([
                'images' => '1.jpg',
                'name_hy' => 'Կոնտակտային Տվյալներ',
                'name_en' => 'Contact',
                'name_ru' => 'Контакты',
                'text_hy' => $contactInfo,
                'text_en' => $contactInfo,
                'text_ru' => $contactInfo,
                'slug' => 'contact',
                'data' => $map
            ]);
        Page::create([
                'images' => '1.jpg',
                'name_hy' => 'Մեր Մասին',
                'name_en' => 'About',
                'name_ru' => 'О Нас',
                'text_hy' => 'text',
                'text_en' => 'text',
                'text_ru' => 'text',
                'slug' => 'about',
                'data' => 'uiui'
            ]);

        Page::create([
                'images' => '1.jpg',
                'name_hy' => 'Տոներ',
                'name_en' => 'Holiday',
                'name_ru' => 'Праздники',
                'text_hy' => 'text',
                'text_en' => 'text',
                'text_ru' => 'text',
                'slug' => 'holiday',
                'data' => 'uiui'
            ]);
    }
}
