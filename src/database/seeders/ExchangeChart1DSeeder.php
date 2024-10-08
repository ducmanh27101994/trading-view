<?php

namespace Fmcpay\TradingView\database\seeders;

use Fmcpay\TradingView\Models\MGExchangeChart1D;
use Illuminate\Database\Seeder;

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
                'date' => (string) strtotime("2024-10-08 12:34:00"),
                'close' => rand(45000, 60000),
                'high' => rand(60000, 65000),
                'low' => rand(40000, 45000),
                'open' => rand(45000, 60000),
                'created_at' => (string) time(),
                'volume' => rand(100, 2000),
            ];
        }
        MGExchangeChart1D::insert($data);
    }
}
