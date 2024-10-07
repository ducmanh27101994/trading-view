<?php

use Illuminate\Support\Facades\Route;
use Fmcpay\TradingView\Http\Controllers\TradingViewController;


Route::post('/config', [TradingViewController::class, 'configTradingView']);

Route::post('/symbols', [TradingViewController::class, 'symbolsTradingView']);


