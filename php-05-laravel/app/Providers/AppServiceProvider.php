<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\OrderRepositoryContract;
use App\Repositories\OrderRepository;
use App\Services\Contracts\InvoicesServiceContract;
use App\Services\InvoicesService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            OrderRepositoryContract::class,
            OrderRepository::class
        );
        $this->app->bind(
            InvoicesServiceContract::class,
            InvoicesService::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
