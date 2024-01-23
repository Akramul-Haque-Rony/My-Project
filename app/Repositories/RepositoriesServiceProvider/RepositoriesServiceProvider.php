<?php
namespace App\Repositories\RepositoriesServiceProvider;

use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider{
    public function register(){
        $this->app->bind(
            'App\Repositories\Interfaces\CategoryRepositoryInterface',
            'App\Repositories\CategoryRepository'
        );
    }
}