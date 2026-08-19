<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Blog;
use App\Observers\BlogObserver;
use App\Policies\BlogPolicy;
use Illuminate\Support\Facades\Gate;
use App\Repositories\BlogRepository;
use App\Repositories\Contracts\BlogRepositoryInterface;
use Illuminate\Support\Facades\Event;
use App\Events\BlogCreated;
use App\Listeners\SendBlogCreatedNotification;
use App\Events\BlogUpdated;
use App\Listeners\SendBlogUpdatedNotification;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //

        Event::listen(
            BlogCreated::class,
            SendBlogCreatedNotification::class
        );
        Event::listen(
            BlogUpdated::class,
            SendBlogUpdatedNotification::class
        );

        $this->app->bind(
            BlogRepositoryInterface::class,
            BlogRepository::class
        );

        Gate::policy(Blog::class, BlogPolicy::class);
        Blog::observe(BlogObserver::class);
    }
}
