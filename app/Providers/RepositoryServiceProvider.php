<?php

namespace App\Providers;

use App\Repositories\EloquentDeviceRepository;
use App\RepositoryInterface\DeviceRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider  // to instantiable while building [App\Http\Controllers\UsersController].
{     // && initialize this file in config\pp.php
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(DeviceRepository::class , EloquentDeviceRepository::class);
        // if you see UsersRepositoryInterface use UsersRepository
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
