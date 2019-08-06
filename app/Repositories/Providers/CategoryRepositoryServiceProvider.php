<?php


namespace App\Repositories\Providers;


use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Orm\Eloquent\CategoryRepository;
use Illuminate\Support\ServiceProvider;

class CategoryRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            CategoryRepositoryInterface::class,
            CategoryRepository::class
        );
    }
}