<?php

return [
    'minmovement' => 1, // Biến động tối thiểu của giá theo đơn vị
    'minmovement2' => 0, // Giúp cải thiện khả năng hiển thị giá cho các tài sản có kích thước phức tạp (0 là không thiết lập)
    'pricescale' => [10000, 10000], // Định dạng hiển thị giá
    'has-dwm' => true, // Dữ liệu có sẵn thông tin dữ liệu hàng ngày, hàng tuần và hàng tháng (daily, weekly, monthly).
    'has-intraday' => true, // Có hỗ trợ dữ liệu lịch sử giao dịch theo phút hay không (true = có)
    'has-no-volume' => [false, false], // Có thể không có dữ liệu về khối lượng giao dịch không (false = không)
    'type' => ['forex', 'forex'], // Loại tài sản
    'timezone' => 'Europe/London', // Múi giờ cho dữ liệu
    'session-regular' => '0000-2400' // Thời gian giao dịch chính thức (00:00 - 24:00)
];
