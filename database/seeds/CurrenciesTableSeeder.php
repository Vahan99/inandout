<?php

use Illuminate\Database\Seeder;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies = [
            [
                'code' => 'AMD',
                'name' => 'Armenian Dram',
                'value' => 0
            ],
            [
                'code' => 'RUB',
                'name' => 'Russian Ruble',
                'value' => 0
            ],
            [
                'code' => 'USD',
                'name' => 'United States Dollar',
                'value' => 0
            ]
        ];

        foreach ($currencies as $currency) {
            currency()->create([
                'name' => $currency['name'],
                'code' => $currency['code'],
                'symbol' => $currency['code'],
                'format' => '$1,0.00',
                'exchange_rate' => 1.00000000,
                'active' => 1,
            ]);
        }
    }
}
