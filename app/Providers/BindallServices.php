<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BindallServices extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind('CurrentbatchStatus', \App\Services\CurrentbatchStatus::class);
        $this->app->bind('ProductDetails', \App\Services\ProductDetails::class);
        $this->app->bind('BatchController', \App\Services\BatchController::class);
        $this->app->bind('ProductionController', \App\Services\ProductionController::class);
        $this->app->bind('ShiftController', \App\Services\ShiftController::class);
        $this->app->bind('DownTime', \App\Services\weekwisedowntime::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
