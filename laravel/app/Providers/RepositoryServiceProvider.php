<?php

namespace App\Providers;

use App\Contracts\ArticleRepositoryInterface;
use App\Contracts\CategoryRepositoryInterface;
use App\Contracts\NotificationRepositoryInterface;
use App\Contracts\SettingRepositoryInterface;
use App\Contracts\SourceRepositoryInterface;
use App\Contracts\UserRepositoryInterface;
use App\Repositories\ArticleRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\NotificationRepository;
use App\Repositories\SettingRepository;
use App\Repositories\SourceRepository;
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
        $this->app->bind(SettingRepositoryInterface::class, SettingRepository::class);
        $this->app->bind(NotificationRepositoryInterface::class, NotificationRepository::class);
        $this->app->bind(SourceRepositoryInterface::class, SourceRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(ArticleRepositoryInterface::class, ArticleRepository::class);
    }
}
