<?php

namespace Fmcpay\TradingView\Http\Controllers;

use Illuminate\Http\Request;
use Fmcpay\TradingView\services\TradingApiService;

class TradingViewController
{
    protected $tradingApiService;

    public function __construct(TradingApiService $tradingApiService)
    {
        $this->tradingApiService = $tradingApiService;
    }
    public function configTradingView()
    {
        $data = $this->tradingApiService->getConfig();

        return response()->json([
            'message' => 'Success',
            'status' => 200,
            'data' => $data
        ]);
    }

    public function symbolsTradingView(Request $request)
    {
        $symbol = $request->input('symbol');
        if (empty($symbol)) {
            return response()->json([
                'message' => 'Chưa gửi mã symbol',
                'status' => 400,
            ]);
        }

        $data = $this->tradingApiService->getSymbol($symbol);

        return response()->json([
            'message' => 'Success',
            'status' => 200,
            'data' => $data ?? []
        ]);
    }


}
