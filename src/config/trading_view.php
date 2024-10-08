<?php

return [
    'supported_resolutions' => ['1', '5', '15', '30', '60', '1D', '1W', '1M'],
    'supports_group_request' => true,
    'supports_marks' => false,
    'supports_search' => true,
    'supports_timescale_marks' => false,
    'symbols_grouping' => [
        "futures" => "/^(.+)([12]!|[FGHJKMNQUVXZ]\\d{1,2})$/",
        "stock" => "/^(.+)([12]!|[FGHJKMNQUVXZ]\\d{1,2})$/",
        "index" => "/^(.+)([12]!|[FGHJKMNQUVXZ]\\d{1,2})$/"
    ],
    'symbols_types' => [
        ['name' => 'All types', 'value' => ''],
        ['name' => 'Stock', 'value' => 'stock'],
        ['name' => 'Futures', 'value' => 'futures'],
        ['name' => 'Forex', 'value' => 'forex'],
        ['name' => 'Crypto', 'value' => 'crypto'],
        ['name' => 'Index', 'value' => 'index']
    ],
];
