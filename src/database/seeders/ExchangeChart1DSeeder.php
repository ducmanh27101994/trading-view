<?php

namespace Fmcpay\TradingView\database\seeders;

use Fmcpay\TradingView\Models\MGExchangeChart1D;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExchangeChart1DSeeder extends Seeder
{
    public function run()
    {

        $recordCount = 100;

        $data = [];

        for ($i = 0; $i < $recordCount; $i++) {
            $data[] = [
                'mc' => 'BTC',
                'ec' => 'USD',
                'date' => now()->subMinutes($i),
                'close' => rand(45000, 60000),
                'high' => rand(60000, 65000),
                'low' => rand(40000, 45000),
                'open' => rand(45000, 60000),
                'created_at' => now(),
                'volume' => rand(100, 2000),
            ];
        }

//        MGExchangeChart1D::create([
//            'mc' => 'BTC',
//            'ec' => 'USD',
//            'date' => now(),
//            'close' => 50000,
//            'high' => 55000,
//            'low' => 45000,
//            'open' => 48000,
//            'created_at' => now(),
//            'volume' => 1500,
//        ]);

        $data = MGExchangeChart1D::all();
        dd($data);
    }
}
