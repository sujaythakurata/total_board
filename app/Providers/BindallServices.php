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
        //current batch service
        $this->app->bind('CurrentbatchStatus',
            \App\Services\CurrentbatchStatus::class);
        //product details
        $this->app->bind('ProductDetails', 
            \App\Services\ProductDetails::class);
        //batch controller
        $this->app->bind('BatchController', 
            \App\Services\BatchController::class);
        //production controller
        $this->app->bind('ProductionController',
            \App\Services\ProductionController::class);
        //shift controller
        $this->app->bind('ShiftController', 
            \App\Services\ShiftController::class);
        //downtime 
        $this->app->bind('DownTime', 
            \App\Services\weekwisedowntime::class);
        //oee calulation
        $this->app->bind('OEEcalculation', 
            \App\Services\OEEcalculation::class);
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
