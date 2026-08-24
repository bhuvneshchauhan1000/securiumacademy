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
use App\Models\Academy;
use App\Models\CourseCategory;
use App\Models\University;
use App\Observers\AcademyObserver;
use App\Observers\UniversityObserver;
use App\Observers\CourseCategoryObserver;
use App\Policies\AcademyPolicy;
use App\Policies\CourseCategoryPolicy;
use App\Policies\UniversityPolicy;
use App\Repositories\AcademyRepository;
use App\Repositories\CourseCategoryRepository;
use App\Repositories\Contracts\AcademyRepositoryInterface;
use App\Repositories\Contracts\UniversityRepositoryInterface;
use App\Repositories\Contracts\CourseCategoryRepositoryInterface;
use App\Repositories\UniversityRepository;

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

        $this->app->bind(BlogRepositoryInterface::class,BlogRepository::class);
        $this->app->bind(UniversityRepositoryInterface::class, UniversityRepository::class);
        $this->app->bind(AcademyRepositoryInterface::class,AcademyRepository::class);
        $this->app->bind(CourseCategoryRepositoryInterface::class, CourseCategoryRepository::class);


        Gate::policy(Blog::class, BlogPolicy::class);
        Gate::policy(University::class, UniversityPolicy::class);
        Gate::policy(Academy::class, AcademyPolicy::class);
        Gate::policy(CourseCategory::class, CourseCategoryPolicy::class);


        Blog::observe(BlogObserver::class);
        University::observe(UniversityObserver::class);
        Academy::observe(AcademyObserver::class);
        CourseCategory::observe(CourseCategoryObserver::class);
    }
}
