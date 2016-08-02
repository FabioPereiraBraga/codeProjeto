<?php

namespace CodeProject\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
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
        $this->app->bind(\CodeProject\Repository\ProjectRepository::class,
                        \CodeProject\Repository\ProjectRepositoryEloquent::class);
        $this->app->bind(\CodeProject\Repository\ProjectNoteRepository::class,
                         \CodeProject\Repository\ProjectNoteRepositoryEloquent::class);
        $this->app->bind(\CodeProject\Repository\ProjectNoteRepository::class,
                         \CodeProject\Repository\ProjectNoteRepositoryEloquent::class);
        $this->app->bind(\CodeProject\Repository\ProjectTaskRepository::class,
                         \CodeProject\Repository\ProjectTaskRepositoryEloquent::class);
        $this->app->bind(\CodeProject\Repository\ProjectMembersRepository::class,
                         \CodeProject\Repository\ProjectMembersRepositoryEloquent::class);

        $this->app->bind(\CodeProject\Repository\UserRepository::class,
                         \CodeProject\Repository\UserRepositoryEloquent::class);
        
        //:end-bindings:
    }
}
