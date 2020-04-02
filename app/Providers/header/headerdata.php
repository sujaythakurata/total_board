<?php

namespace App\Providers\header;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class headerdata extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //view()->composer("include.header", function($view){
          //  $status = app()->make('CurrentbatchStatus')->GetStatus();
          //  $view->with("data",$status);
        //});
        View::composer(
            ['include.header', 'component.overviewsec1'], 
            'App\Http\View\Composer\headercontroller'
        );

    }
}
