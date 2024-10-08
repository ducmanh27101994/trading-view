<?php

namespace Fmcpay\TradingView\services;

use Fmcpay\TradingView\database\seeders\ExchangeChart1DSeeder;
use Fmcpay\TradingView\Models\MGExchangeChart1D;
use Illuminate\Support\Facades\DB;

class TradingApiService
{

    public function getConfig()
    {
        return config('trading_view');
    }

    public function getSymbol($symbol)
    {
        $result = DB::table('symbols')
            ->where('base', $symbol)
            ->select(['base', 'title', 'quote'])
            ->first();

        $data = [];
        if (!empty($result)) {
            $data['symbol'] = strtoupper($result->base);
            $data['full_name'] = $result->title;
            $data['description'] = $result->title;
            $data['exchange'] = $result->quote;
            $data['ticker'] = strtoupper($result->base);

            $data['type'] = config('symbol_info.type');
            $data['session'] = config('symbol_info.session');
            $data['timezone'] = config('symbol_info.timezone');
            $data['minmov'] = config('symbol_info.minmov');
            $data['pricescale'] = config('symbol_info.pricescale');
            $data['minmove2'] = config('symbol_info.minmove2');
            $data['fractional'] = config('symbol_info.fractional');
            $data['has_intraday'] = config('symbol_info.has_intraday');
            $data['supported_resolutions'] = config('symbol_info.supported_resolutions');
            $data['intraday_multipliers'] = config('symbol_info.intraday_multipliers');
            $data['has_seconds'] = config('symbol_info.has_seconds');
            $data['seconds_multipliers'] = config('symbol_info.seconds_multipliers');
            $data['has_daily'] = config('symbol_info.has_daily');
            $data['has_weekly_and_monthly'] = config('symbol_info.has_weekly_and_monthly');
            $data['has_empty_bars'] = config('symbol_info.has_empty_bars');
            $data['force_session_rebuild'] = config('symbol_info.force_session_rebuild');
            $data['has_no_volume'] = config('symbol_info.has_no_volume');
            $data['volume_precision'] = config('symbol_info.volume_precision');
            $data['data_status'] = config('symbol_info.data_status');
            $data['expired'] = config('symbol_info.expired');
            $data['expiration_date'] = config('symbol_info.expiration_date');
            $data['sector'] = config('symbol_info.sector');
            $data['industry'] = config('symbol_info.industry');
            $data['currency_code'] = config('symbol_info.currency_code');
        }

        return $data;
    }

    public function getSymbolGroup($symbolGroup)
    {
        $result = DB::table('symbols')
            ->where('quote', $symbolGroup)
            ->pluck('base')
            ->toArray();

        $data = [];
        if (!empty($result)) {
            $data['symbol'] = $result;
            $data['description'] = $result;
            $data['exchange-listed'] = $symbolGroup;
            $data['exchange-traded'] = $symbolGroup;
            $data['minmovement'] = config('symbol_groups.minmovement');
            $data['minmovement2'] = config('symbol_groups.minmovement2');
            $data['has-dwm'] = config('symbol_groups.has-dwm');
            $data['has-intraday'] = config('symbol_groups.has-intraday');
            $data['has-no-volume'] = config('symbol_groups.has-no-volume');
            $data['type'] = config('symbol_groups.type');
            $data['ticker'] = $result;
            $data['timezone'] = config('symbol_groups.timezone');
            $data['session-regular'] = config('symbol_groups.session-regular');
        }

        return $data;
    }

    public function historyChartData($symbol, $from, $to, $resolution)
    {
        $data = [];
        if ($resolution == '1D') {
            $historicalData = MGExchangeChart1D::where('mc', $symbol)
                ->where('date', '>=', "$from")
                ->where('date', '<=', "$to")
                ->orderBy('date')
                ->get();

            if (!empty($historicalData)) {
                $data = [
                    's' => 'ok',
                    't' => $historicalData->pluck('date')->toArray(),
                    'o' => $historicalData->pluck('open')->toArray(),
                    'h' => $historicalData->pluck('high')->toArray(),
                    'l' => $historicalData->pluck('low')->toArray(),
                    'c' => $historicalData->pluck('close')->toArray(),
                    'v' => $historicalData->pluck('volume')->toArray(),
                    'nextTime' => time(),
                ];
            }
        }
        return $data;
    }
}
