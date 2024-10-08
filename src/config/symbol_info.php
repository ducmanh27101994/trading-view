<?php

return [
    "type" => "stock",
    "session" => "0930-1600",
    "timezone" => "America/New_York",
    "minmov" => 1,
    "pricescale" => 100,
    "minmove2" => 0,
    "fractional" => false,
    "has_intraday" => true,
    "supported_resolutions" => [
        "1",
        "5",
        "15",
        "30",
        "60",
        "1D"
    ],
    "intraday_multipliers" => [
        1,
        5,
        15,
        30,
        60
    ],
    "has_seconds" => false,
    "seconds_multipliers" => [],
    "has_daily" => true,
    "has_weekly_and_monthly" => true,
    "has_empty_bars" => false,
    "force_session_rebuild" => true,
    "has_no_volume" => false,
    "volume_precision" => 0,
    "data_status" => "streaming",
    "expired" => false,
    "expiration_date" => null,
    "sector" => "Technology",
    "industry" => "Consumer Electronics",
    "currency_code" => "USD"
];
