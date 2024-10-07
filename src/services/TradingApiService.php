<?php

namespace Fmcpay\TradingView\services;

class TradingApiService
{
    const symbolInfo = [
        'AAPL' => [
            'symbol' => 'AAPL',
            'full_name' => 'NASDAQ:AAPL',
            'description' => 'Apple Inc.',
            'exchange' => 'NASDAQ',
            'ticker' => 'AAPL',
            'type' => 'stock',
            'session' => '0930-1600',
            'timezone' => 'America/New_York',
            'minmov' => 1,
            'pricescale' => 100,
            'minmove2' => 0,
            'fractional' => false,
            'has_intraday' => true,
            'supported_resolutions' => ['1', '5', '15', '30', '60', '1D'],
            'intraday_multipliers' => [1, 5, 15, 30, 60],
            'has_seconds' => false,
            'seconds_multipliers' => [],
            'has_daily' => true,
            'has_weekly_and_monthly' => true,
            'has_empty_bars' => false,
            'force_session_rebuild' => true,
            'has_no_volume' => false,
            'volume_precision' => 0,
            'data_status' => 'streaming',
            'expired' => false,
            'expiration_date' => null,
            'sector' => 'Technology',
            'industry' => 'Consumer Electronics',
            'currency_code' => 'USD',
        ],
        'AAL' => [
            'symbol' => 'AAL',
            'full_name' => 'NASDAQ:AAL',
            'description' => 'American Airlines Group Inc.',
            'exchange' => 'NASDAQ',
            'ticker' => 'AAL',
            'type' => 'index',
            'session' => '0930-1600',
            'timezone' => 'America/New_York',
            'minmov' => 1,
            'pricescale' => 100,
            'minmove2' => 0,
            'fractional' => false,
            'has_intraday' => true,
            'supported_resolutions' => ['1', '5', '15', '30', '60', '1D'],
            'intraday_multipliers' => [1, 5, 15, 30, 60],
            'has_seconds' => false,
            'seconds_multipliers' => [],
            'has_daily' => true,
            'has_weekly_and_monthly' => true,
            'has_empty_bars' => false,
            'force_session_rebuild' => true,
            'has_no_volume' => false,
            'volume_precision' => 0,
            'data_status' => 'streaming',
            'expired' => false,
            'expiration_date' => null,
            'sector' => 'Industrials',
            'industry' => 'Airlines',
            'currency_code' => 'USD',
        ],
        'MSFT' => [
            'symbol' => 'MSFT',
            'full_name' => 'NASDAQ:MSFT',
            'description' => 'Microsoft Corp.',
            'exchange' => 'NASDAQ',
            'ticker' => 'MSFT',
            'type' => 'stock',
            'session' => '0930-1600',
            'timezone' => 'America/New_York',
            'minmov' => 1,
            'pricescale' => 100,
            'minmove2' => 0,
            'fractional' => false,
            'has_intraday' => true,
            'supported_resolutions' => ['1', '5', '15', '30', '60', '1D', '1W', '1M'],
            'intraday_multipliers' => [1, 5, 15, 30, 60],
            'has_seconds' => false,
            'has_daily' => true,
            'has_weekly_and_monthly' => true,
            'has_empty_bars' => false,
            'force_session_rebuild' => true,
            'has_no_volume' => false,
            'volume_precision' => 0,
            'data_status' => 'streaming',
            'expired' => false,
            'expiration_date' => null,
            'sector' => 'Technology',
            'industry' => 'Software',
            'currency_code' => 'USD',
        ],
    ];


    public function getConfig()
    {
        return [
            'supported_resolutions' => ['1', '5', '15', '30', '60', '1D', '1W', '1M'],
            'supports_group_request' => true,
            'supports_marks' => false,
            'supports_search' => true,
            'supports_timescale_marks' => false,
            // symbols_grouping: groups symbols into categories like stock, futures, index, etc.
            'symbols_grouping' => [
                "futures" => "/^(.+)([12]!|[FGHJKMNQUVXZ]\\d{1,2})$/",
                "stock" => "/^(.+)([12]!|[FGHJKMNQUVXZ]\\d{1,2})$/",
                "index" => "/^(.+)([12]!|[FGHJKMNQUVXZ]\\d{1,2})$/"
            ],
            // symbols_types: defines the symbol types for the search filters, including index
            'symbols_types' => [
                ['name' => 'All types', 'value' => ''],
                ['name' => 'Stock', 'value' => 'stock'],
                ['name' => 'Futures', 'value' => 'futures'],
                ['name' => 'Forex', 'value' => 'forex'],
                ['name' => 'Crypto', 'value' => 'crypto'],
                ['name' => 'Index', 'value' => 'index']
            ]
        ];
    }

    public function getSymbol($symbol)
    {
        return TradingApiService::symbolInfo[strtoupper($symbol)] ?? null;
    }
}
