<?php

namespace App\Providers;

use App\Repositories\Contracts\ProductRepositoryContact;
use App\Repositories\ProductRepository;
use Illuminate\Support\ServiceProvider;

class ProductRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ProductRepositoryContact::class,
            ProductRepository::class
        );
    }


}
