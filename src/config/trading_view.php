<?php

return [
    'supported_resolutions' => ['1', '5', '15', '30', '60', '1D', '1W', '1M'], //Danh sách các khoảng thời gian mà hệ thống biểu đồ hỗ trợ.
    'supports_group_request' => true, //Hệ thống có cho phép nhóm các loại tài sản với nhau hay không (true là có)
    'supports_marks' => false, //Cho biết hệ thống có hỗ trợ đánh dấu đặc biệt trên biểu đồ giá hay không (false là không)
    'supports_search' => true, // Hệ thống có cho phép sử dụng chức năng tìm kiếm tài sản hay không
    'supports_timescale_marks' => false, //Cho biết hệ thống có hỗ trợ đánh dấu mốc trên thang thời gian (false là không)
    'symbols_grouping' => [ //Quy định cách nhóm các loại tài sản dựa trên loại của chúng
        "futures" => "/^(.+)([12]!|[FGHJKMNQUVXZ]\\d{1,2})$/",
        "stock" => "/^(.+)([12]!|[FGHJKMNQUVXZ]\\d{1,2})$/",
        "index" => "/^(.+)([12]!|[FGHJKMNQUVXZ]\\d{1,2})$/"
    ],
    'symbols_types' => [ //Danh sách loại tài sản mà hệ thống hỗ trợ
        ['name' => 'All types', 'value' => ''],
        ['name' => 'Stock', 'value' => 'stock'],
        ['name' => 'Futures', 'value' => 'futures'],
        ['name' => 'Forex', 'value' => 'forex'],
        ['name' => 'Crypto', 'value' => 'crypto'],
        ['name' => 'Index', 'value' => 'index']
    ],
];
