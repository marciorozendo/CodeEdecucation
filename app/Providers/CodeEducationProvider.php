<?php

namespace CodeEducation\Providers;

use Illuminate\Support\ServiceProvider;

class CodeEducationProvider extends ServiceProvider
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
        $this->app->bind(
            \CodeEducation\Repositories\ClientRepository::class ,
            \CodeEducation\Repositories\ClientRepositoryEloquent::class
        );
        $this->app->bind(
            \CodeEducation\Repositories\ProjectRepository::class ,
            \CodeEducation\Repositories\ProjectRepositoryEloquent::class
        );
        $this->app->bind(
            \CodeEducation\Repositories\ProjectNoteRepository::class ,
            \CodeEducation\Repositories\ProjectNoteRepositoryEloquent::class
        );
    }
}
