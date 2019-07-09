<?php

use Illuminate\Database\Seeder;

class VacancyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Vacancy::class, 20)->create();
    }
}
