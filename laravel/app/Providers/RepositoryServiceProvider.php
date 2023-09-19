<?php

namespace App\Providers;

use App\Contracts\ArticleRepositoryInterface;
use App\Contracts\UserRepositoryInterface;
use App\Repositories\ArticleRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

/**
 * Class RepositoryServiceProvider
 * @package App\Providers
 */
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(ArticleRepositoryInterface::class, ArticleRepository::class);
    }
}
