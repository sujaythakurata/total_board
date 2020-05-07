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
        //oee details index wise
        $this->app->bind('oee', 
            \App\Services\oee::class);
        //get shift info
        $this->app->bind('shiftinfo', 
            \App\Services\shiftinfo::class);
        //Production details machine wise
        $this->app->bind('MprodDetails', 
            \App\Services\MprodDetails::class);
        //Production details machine wise
        $this->app->bind('MDT', 
            \App\Services\Machine\machineproddetails::class);
        //shiftwise prod and shiftwise downtime
        $this->app->bind('SDT', 
            \App\Services\Machine\machineshift::class);
        //machine rate machine wise
        $this->app->bind('MR', 
            \App\Services\Machine\machinerate::class);
        //get the today shiftewise machine production
        $this->app->bind('TSP', 
            \App\Services\Machine\shiftwiseprod::class); 
        //get weekwise production and downtime
        $this->app->bind('WSDD', 
            \App\Services\Machine\weekwisedata::class);

        //get the hour wise oee
        $this->app->bind('oeehourwise', 
            \App\Services\Machine\oeehourwise::class);
        //bind the input calculate service
        $this->app->bind('calculate', 
            \App\Services\setting\calculate::class);
        //bind the input calculate service
        $this->app->bind('createbatch', 
            \App\Services\setting\createbatch::class);                 
        //start a new batch
        $this->app->bind('batchstart', 
            \App\Services\setting\batchstart::class); 
        //stop a batch
        $this->app->bind('batchstop', 
            \App\Services\setting\batchstop::class); 
        //get weekday
        $this->app->bind('getweekday', 
            \App\Services\getweekday::class);
        //get shift wise oee
        $this->app->bind('Shiftoee', 
            \App\Services\Shiftoee::class);
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
