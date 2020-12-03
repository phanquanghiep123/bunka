<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Http\Models\Quotations;
use App\Observers\QuotationObserver;
use App\Http\Models\Orders;
use App\Observers\OrderObserver;
use App\Http\Models\Contracts;
use App\Observers\ContractObserver;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //s
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Way\Generators\GeneratorsServiceProvider::class);
            $this->app->register(\Xethron\MigrationsGenerator\MigrationsGeneratorServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Quotations::observe(QuotationObserver::class);
        Orders::observe(OrderObserver::class);
        Contracts::observe(ContractObserver::class);
    }
}
