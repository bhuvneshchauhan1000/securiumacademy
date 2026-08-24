<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Event;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\Academy;
use App\Models\University;
use App\Models\Blog;
use App\Observers\CourseObserver;
use App\Observers\CourseCategoryObserver;
use App\Observers\AcademyObserver;
use App\Observers\UniversityObserver;
use App\Observers\BlogObserver;
use App\Policies\CoursePolicy;
use App\Policies\CourseCategoryPolicy;
use App\Policies\AcademyPolicy;
use App\Policies\UniversityPolicy;
use App\Policies\BlogPolicy;
use App\Repositories\BlogRepository;
use App\Repositories\Contracts\BlogRepositoryInterface;
use App\Events\BlogCreated;
use App\Events\BlogUpdated;
use App\Listeners\SendBlogCreatedNotification;
use App\Listeners\SendBlogUpdatedNotification;
use App\Repositories\CourseCategoryRepository;
use App\Repositories\Contracts\CourseCategoryRepositoryInterface;
use App\Repositories\UniversityRepository;
use App\Repositories\Contracts\UniversityRepositoryInterface;
use App\Repositories\AcademyRepository;
use App\Repositories\Contracts\AcademyRepositoryInterface;
use App\Repositories\CourseRepository;
use App\Repositories\Contracts\CourseRepositoryInterface;
use App\Events\CourseCreated;
use App\Events\CourseUpdated;
use App\Listeners\SendCourseCreatedNotification;
use App\Listeners\SendCourseUpdatedNotification;

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
        Event::listen(
            CourseCreated::class,
            SendCourseCreatedNotification::class
        );
        Event::listen(
            CourseUpdated::class,
            SendCourseUpdatedNotification::class
        );

        $this->app->bind(BlogRepositoryInterface::class,BlogRepository::class);
        $this->app->bind(UniversityRepositoryInterface::class, UniversityRepository::class);
        $this->app->bind(AcademyRepositoryInterface::class,AcademyRepository::class);
        $this->app->bind(CourseCategoryRepositoryInterface::class, CourseCategoryRepository::class);
        $this->app->bind(CourseRepositoryInterface::class, CourseRepository::class);


        Gate::policy(Blog::class, BlogPolicy::class);
        Gate::policy(University::class, UniversityPolicy::class);
        Gate::policy(Academy::class, AcademyPolicy::class);
        Gate::policy(CourseCategory::class, CourseCategoryPolicy::class);
        Gate::policy(Course::class, CoursePolicy::class);

        Blog::observe(BlogObserver::class);
        University::observe(UniversityObserver::class);
        Academy::observe(AcademyObserver::class);
        CourseCategory::observe(CourseCategoryObserver::class);
        Course::observe(CourseObserver::class);
    }
}
