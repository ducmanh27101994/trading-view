<?php

namespace Fmcpay\TradingView;
use Illuminate\Support\ServiceProvider;
class TradingViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/api.php');
    }



}
