<?php

namespace Fmcpay\TradingView;
use Illuminate\Support\ServiceProvider;
class TradingViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/api.php');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->loadSeedsFrom(__DIR__ . '/database/seeders');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/trading_view.php', 'trading_view');
        $this->mergeConfigFrom(__DIR__.'/config/symbol_groups.php', 'symbol_groups');
        $this->mergeConfigFrom(__DIR__.'/config/symbol_info.php', 'symbol_info');
    }

    protected function loadSeedsFrom($path)
    {
        if (class_exists('Seeder')) {
            require_once $path . '/ExchangeChart1DSeeder.php';
        }
    }



}
