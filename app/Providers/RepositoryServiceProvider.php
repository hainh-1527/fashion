<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
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
        // Brand
        $this->app->bind(
            \App\Repositories\Contracts\BrandRepositoryInterface::class,
            \App\Repositories\Eloquent\BrandRepository::class
        );
    }
}
