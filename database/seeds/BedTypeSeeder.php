<?php

use Illuminate\Database\Seeder;

class BedTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $beds = [
            ['name_en' => 'Double', 'name_hy' => 'Կրկնակի', 'name_ru' => 'Двойной'],
            ['name_en' => 'Single', 'name_hy' => 'Մեկ տեղանոց', 'name_ru' => 'Одиночный'],
        ];
        \App\BedType::insert($beds);
    }
}
