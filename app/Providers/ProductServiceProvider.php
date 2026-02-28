<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ProductService;

class ProductServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(ProductService::class, function ($app) {
            $products = [
                [
                    'id' => 1,
                    'name' => 'orange',
                    'category' => 'fruits',
                ],
                [
                    'id' => 2,
                    'name' => 'carrots',
                    'category' => 'vegetables',
                ],
            ];
            return new ProductService($products);
        });
    }

    public function boot(): void
    {
        view()->share('productKey', 'abc123');
        //
    }
}
