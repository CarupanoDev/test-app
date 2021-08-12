<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Grade\Domain\Contracts\GradeRepositoryContract;
use Src\Grade\Infrastructure\Repositories\EloquentGradeRepository;

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
            GradeRepositoryContract::class,
            EloquentGradeRepository::class
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
