<?php

namespace App\Providers;

use App\Repositories\Categories\CategoryEloquentRepository;
use App\Repositories\Categories\CategoryRepositoryInterface;
use App\Repositories\Infos\InfoEloquentRepository;
use App\Repositories\Infos\InfoRepositoryInterface;
use App\Repositories\Units\UnitEloquentRepository;
use App\Repositories\Units\UnitRepositoryInterface;
use App\Repositories\Users\UserEloquentRepository;
use App\Repositories\Users\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

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
            UserRepositoryInterface::class,
            UserEloquentRepository::class
        );

        $this->app->bind(
            CategoryRepositoryInterface::class,
            CategoryEloquentRepository::class
        );

        $this->app->bind(
            UnitRepositoryInterface::class,
            UnitEloquentRepository::class
        );

        $this->app->bind(
            InfoRepositoryInterface::class,
            InfoEloquentRepository::class
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
