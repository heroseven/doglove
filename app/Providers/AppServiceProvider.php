<?php

namespace App\Providers;


use App\Doglove\Mascota\MascotaRepo;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
/*
        $this->app->singleton('Doglove\Mascota\MascotaRepoInterface', function ($app) {
            return new MascotaRepo();
        });*/
    }
}
