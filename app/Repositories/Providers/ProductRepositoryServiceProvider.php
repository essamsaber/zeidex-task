<?php


namespace App\Repositories\Providers;


use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Orm\Eloquent\ProductRepository;
use Illuminate\Support\ServiceProvider;

class ProductRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            ProductRepositoryInterface::class,
            ProductRepository::class
        );
    }
}