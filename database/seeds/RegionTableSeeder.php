<?php

use Illuminate\Database\Seeder;
use App\Region;

class RegionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        $regions = [
            ['Երևան', 'Yerevan', 'Ереван'],
            ['Արագածոտն', 'Aragatsotn', 'Арагацотн'],
            ['Արարատ', 'Ararat', 'Арарат'],
            ['Արմավիր', 'Armavir', 'Армавир'],
            ['Գեղարքունիք', 'Gegharkunik', 'Гехаркуник'],
            ['Կոտայք', 'Kotayk', 'Котайкской'],
            ['Լոռի', 'Lori', 'Лори'],
            ['Շիրակ', 'Shirak', 'Ширак'],
            ['Տավուշ', 'Tavush', 'Тавуш'],
            ['Սյունիք', 'Syunik', 'Сюник'],
            ['Վայոց ձոր', 'Vayots Dzor', 'Вайоц Дзор']
        ];

        foreach ($regions as $region) {
            Region::create([
                'desc_hy' => $faker->paragraph(30),
                'desc_en' => $faker->paragraph(30),
                'desc_ru' => $faker->paragraph(30),
                'name_hy' => $region[0],
                'name_en' => $region[1],
                'name_ru' => $region[2],
                'slug' => str_slug($region[1])
            ]);
        }
    }
}
