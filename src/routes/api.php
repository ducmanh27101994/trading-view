<?php

use Illuminate\Support\Facades\Route;
use Fmcpay\TradingView\Http\Controllers\TradingViewController;


Route::post('/config', [TradingViewController::class, 'configTradingView']);
Route::post('/symbols', [TradingViewController::class, 'symbolsTradingView']);
Route::post('/symbol_info', [TradingViewController::class, 'symbolsGroupTradingView']);
Route::post('/history', [TradingViewController::class, 'historyTradingView']);




// Cập nhật DB test
Route::post('/insertOrUpdateDBSymbols', [TradingViewController::class, 'insertOrUpdateDBSymbols']);


