<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\interface\CategoryRepositoryInterface;
use App\Repositories\CategoryRepository;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
