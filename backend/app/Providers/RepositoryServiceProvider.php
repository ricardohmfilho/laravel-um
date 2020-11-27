<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\PlanRepository;
use App\Repositories\Interfaces\PlanRepositoryInterface;

use App\Repositories\StateRepository;
use App\Repositories\Interfaces\StateRepositoryInterface;

use App\Repositories\CityRepository;
use App\Repositories\Interfaces\CityRepositoryInterface;

use App\Repositories\CustomerRepository;
use App\Repositories\Interfaces\CustomerRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            PlanRepositoryInterface::class, 
            PlanRepository::class
        );
        $this->app->bind(
            StateRepositoryInterface::class, 
            StateRepository::class
        );
        $this->app->bind(
            CityRepositoryInterface::class, 
            CityRepository::class
        );
        $this->app->bind(
            CustomerRepositoryInterface::class, 
            CustomerRepository::class
        );
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
