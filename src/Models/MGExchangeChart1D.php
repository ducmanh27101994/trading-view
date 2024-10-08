<?php

namespace Fmcpay\TradingView\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class MGExchangeChart1D extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'exchange_chart1d';

    protected $fillable = [
        'mc',
        'ec',
        'date',
        'close',
        'high',
        'low',
        'open',
        'created_at',
        'volume'
    ];

}
