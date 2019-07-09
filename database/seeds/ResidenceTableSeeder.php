<?php

use Illuminate\Database\Seeder;

class ResidenceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Residence::class, 60)->create();
    }
}
