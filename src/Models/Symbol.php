<?php

namespace Fmcpay\TradingView\Models;

use Illuminate\Database\Eloquent\Model;

class Symbol extends Model
{
    protected $fillable = [
        'title', 'images', 'base', 'quote', 'fix_base', 'fix_quote',
        'open', 'close', 'high', 'low', 'chg', 'lastPrice', 'lastSide',
        'v', 'q', 'fee', 'minQuote', 'status', 'isStocks'
    ];
}
