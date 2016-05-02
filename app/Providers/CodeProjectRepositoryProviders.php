<?php

namespace CodeProject\Providers;

use Illuminate\Support\ServiceProvider;

class CodeProjectRepositoryProviders extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
       $this->app->bind(\CodeProject\Repository\ClienteRepository::class,
                        \CodeProject\Repository\ClientRepositoryEloquent::class);

       $this->app->bind(\CodeProject\Repository\ProjectRepository::class,
                        \CodeProject\Repository\ProjectRepositoryEloquent::class);


    }
}









