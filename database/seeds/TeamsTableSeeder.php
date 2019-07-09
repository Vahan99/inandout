<?php

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $desc = 'Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim.';
        $employees = [
            [
                'name' => 'Jynda Martin',
                'rank' => 'Marketing Manager'
            ],
            [
                'name' => 'George Smith',
                'rank' => 'Site Administrator'
            ],
            [
                'name' => 'Bill Amadeus',
                'rank' => 'Tour Operator'
            ],
            [
                'name' => 'Amanda Stoun',
                'rank' => 'Director'
            ],
        ];

        foreach ($employees as $key => $employee) {
            \App\Team::create([
                'image' => 'team0' . ++$key . '.jpg',
                'rank_hy' => $employee['rank'],
                'rank_en' => $employee['rank'],
                'rank_ru' => $employee['rank'],
                'name_hy' => $employee['name'],
                'name_en' => $employee['name'],
                'name_ru' => $employee['name'],
                'description_hy' => $desc,
                'description_en' => $desc,
                'description_ru' => $desc,
            ]);
        }
    }
}
