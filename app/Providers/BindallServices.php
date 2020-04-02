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
