<?php

namespace Fmcpay\TradingView\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Fmcpay\TradingView\services\TradingApiService;
use Fmcpay\TradingView\Models\Symbol;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

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

    //Hàm cập nhật db test
    public function insertOrUpdateDBSymbols()
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer 5986|kIklXmjIbIKYu3VAU3RuBTBsrXEw3sGTG0ejb0hK'
            ])->post('https://sb-api.fmcpay.com/api/v2/exchange/tickers');

            if ($response->successful()) {
                $data = $response->json();

                if (isset($data['result']) && is_array($data['result'])) {
                    DB::beginTransaction();

                    $symbolCount = 0;

                    foreach ($data['result'] as $symbolData) {
                        Symbol::updateOrCreate(
                            ['base' => $symbolData['base'], 'quote' => $symbolData['quote']],
                            [
                                'title' => $symbolData['title'],
                                'images' => $symbolData['images'],
                                'fix_base' => $symbolData['fix_base'],
                                'fix_quote' => $symbolData['fix_quote'],
                                'open' => $symbolData['open'],
                                'close' => $symbolData['close'],
                                'high' => $symbolData['high'],
                                'low' => $symbolData['low'],
                                'chg' => $symbolData['chg'],
                                'lastPrice' => $symbolData['lastPrice'],
                                'lastSide' => $symbolData['lastSide'],
                                'v' => $symbolData['v'],
                                'q' => $symbolData['q'],
                                'fee' => $symbolData['fee'],
                                'minQuote' => $symbolData['minQuote'],
                                'status' => $symbolData['status'],
                                'isStocks' => $symbolData['isStocks'],
                            ]
                        );
                        $symbolCount++;
                    }
                    DB::commit();
                    Log::info("Cập nhật thành công $symbolCount symbols từ API.");
                } else {
                    Log::warning('Không tìm thấy trường result hoặc result không phải là mảng.');
                }
            } else {
                Log::error('API call không thành công. Response status: ' . $response->status());
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Có lỗi xảy ra khi cập nhật symbols: ' . $e->getMessage());
        }
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

    public function symbolsGroupTradingView(Request $request)
    {
        $symbolGroup = $request->input('group');
        if (empty($symbolGroup)) {
            return response()->json([
                'message' => 'Chưa gửi mã group',
                'status' => 400,
            ]);
        }

        $data = $this->tradingApiService->getSymbolGroup($symbolGroup);

        return response()->json([
            'message' => 'Success',
            'status' => 200,
            'data' => $data ?? []
        ]);
    }

    public function historyTradingView(Request $request)
    {

        $input = $request->all();
        $validate = Validator::make($input, [
            'symbol' => 'required',
            'from' => 'required',
            'to' => 'required',
            'resolution' => 'required',
        ], [
            'symbol.required' => 'Chưa gửi mã symbol.',
            'from.required' => 'Chưa gửi thời gian bắt đầu.',
            'to.required' => 'Chưa gửi thời gian kết thúc.',
            'resolution.required' => 'Chưa gửi resolution.',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'message' => $validate->errors(),
                'status' => 400,
            ]);
        }

        $data = $this->tradingApiService->historyChartData($input['symbol'], $input['from'], $input['to'], $input['resolution']);

        return response()->json([
            'message' => 'Success',
            'status' => 200,
            'data' => $data ?? []
        ]);
    }


}
