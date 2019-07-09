<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;

class updateCurrencies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:currencies';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update currencies table';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $access_key = env('CURRENCYLAYER_KEY', '89c0820d64e43f1614fb102c92c8472f');
        // set API Endpoint and access key (and any options of your choice)
        $endpoint = 'live';

        // Initialize CURL:
        $ch = curl_init('http://apilayer.net/api/'.$endpoint.'?access_key='.$access_key.'');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Store the data:
        $json = curl_exec($ch);
        curl_close($ch);

        // Decode JSON response:
        $exchangeRates = json_decode($json, true);

        // Access the exchange rate values, e.g. GBP:
        $amd = $exchangeRates['quotes']['USDAMD'];
        $usd = 1 / $amd;
        $rub = $exchangeRates['quotes']['USDRUB'] / $amd;

        currency()->update('USD', ['exchange_rate' => $usd]);
        currency()->update('RUB', ['exchange_rate' => $rub]);
    }
}
