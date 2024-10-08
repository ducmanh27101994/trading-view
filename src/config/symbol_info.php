<?php

return [
    "type" => "stock", // Loại tài sản
    "session" => "0930-1600", // Thời gian giao dịch cho thị trường (từ 9:30 đến 16:00)
    "timezone" => "America/New_York", // Múi giờ cho thời gian giao dịch
    "minmov" => 1, // Biến động tối thiểu của giá theo đơn vị
    "pricescale" => 100, // Định dạng hiển thị giá
    "minmove2" => 0, // Giúp cải thiện khả năng hiển thị giá cho các tài sản có kích thước phức tạp (0 là không thiết lập)
    "fractional" => false, // Giá có được hiển thị dưới dạng phân số hay không (false = không)
    "has_intraday" => true, // Có hỗ trợ dữ liệu lịch sử giao dịch theo phút hay không (true = có)
    "supported_resolutions" => [ // Các khoảng thời gian hỗ trợ cho biểu đồ (Giờ)
        "1",
        "5",
        "15",
        "30",
        "60",
        "1D"
    ],
    "intraday_multipliers" => [ // List các khung giờ hiển thị biểu đồ theo (phút)
        1,
        5,
        15,
        30,
        60
    ],
    "has_seconds" => false, // Có hỗ trợ dữ liệu giao dịch theo giây hay không (false = không)
    "seconds_multipliers" => [], // Giúp xác định các độ phân giải thời gian ngắn mà nguồn dữ liệu hỗ trợ và cho phép tự động tạo ra các độ phân giải khác khi cần thiết.
    "has_daily" => true, // Có hỗ trợ nguồn giao dịch theo ngày hay không (true = có)
    "has_weekly_and_monthly" => true, // Có hỗ trợ giao diện thanh(bars) theo tuần và tháng hay không (true = có)
    "has_empty_bars" => false, // Có hỗ trợ thanh(bars) không có dữ liệu hay không (false = không) còn true sẽ tự động điền các khoảng trống này bằng cách tạo ra các thanh trống cho thời gian đó
    "force_session_rebuild" => true, // Bắt buộc tái tạo phiên giao dịch (true = có)
    "has_no_volume" => false, // Có thể không có dữ liệu về khối lượng giao dịch không (false = không, tức là phải có khối lượng giao dịch )
    "volume_precision" => 0, // Độ chính xác của khối lượng giao dịch, 0 là số nguyên, 1 là có thể có 1 ký tự sau dấy phẩy
    "data_status" => "streaming", // Trạng thái dữ liệu (streaming = live trực tiếp, endofday = cuối ngày, delayed_streaming = live có thời gian delay )
    "expired" => false, // Có hết hạn hay không (false = không)
    "expiration_date" => null, // Ngày hết hạn (null = không có)
    "sector" => "Technology", // Ngành
    "industry" => "Consumer Electronics", // Ngành con
    "currency_code" => "USD" // Mã tiền tệ
];
