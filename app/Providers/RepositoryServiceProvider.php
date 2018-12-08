<?php

namespace App\Providers;


use App\Contracts\CartRepositoryInterface;
use App\Contracts\InventoryRepositoryInterface;
use App\Repositories\CartRepository;
use App\Repositories\InventoryRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bind the interface to an implementation repository class
     */
    public function register()
    {
        $this->app->bind(
            InventoryRepositoryInterface::class,
            InventoryRepository::class
        );

        $this->app->bind(
            CartRepositoryInterface::class,
            CartRepository::class
        );
    }
}