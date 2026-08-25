<?php

namespace App\Providers;

use App\Events\BlogCreated;
use App\Events\BlogUpdated;
use App\Events\JobPostCreated;
use App\Events\JobPostUpdated;
use App\Listeners\SendBlogCreatedNotification;
use App\Listeners\SendBlogUpdatedNotification;
use App\Listeners\SendJobPostCreatedNotification;
use App\Listeners\SendJobPostUpdatedNotification;
use App\Models\Academy;
use App\Models\Blog;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\JobCategory;
use App\Models\JobPost;
use App\Models\JobType;
use App\Models\University;
use App\Models\Testimonial;
use App\Observers\AcademyObserver;
use App\Observers\BlogObserver;
use App\Observers\CourseCategoryObserver;
use App\Observers\CourseObserver;
use App\Observers\JobCategoryObserver;
use App\Observers\JobPostObserver;
use App\Observers\JobTypeObserver;
use App\Observers\UniversityObserver;
use App\Policies\AcademyPolicy;
use App\Policies\BlogPolicy;
use App\Policies\CourseCategoryPolicy;
use App\Policies\CoursePolicy;
use App\Policies\JobCategoryPolicy;
use App\Policies\JobPostPolicy;
use App\Policies\JobTypePolicy;
use App\Policies\UniversityPolicy;
use App\Policies\TestimonialPolicy;
use App\Repositories\AcademyRepository;
use App\Repositories\BlogRepository;
use App\Repositories\Contracts\AcademyRepositoryInterface;
use App\Repositories\Contracts\BlogRepositoryInterface;
use App\Repositories\Contracts\CourseCategoryRepositoryInterface;
use App\Repositories\Contracts\CourseRepositoryInterface;
use App\Repositories\Contracts\JobCategoryRepositoryInterface;
use App\Repositories\Contracts\JobPostRepositoryInterface;
use App\Repositories\Contracts\JobTypeRepositoryInterface;
use App\Repositories\Contracts\TestimonialRepositoryInterface;
use App\Repositories\Contracts\UniversityRepositoryInterface;
use App\Repositories\CourseCategoryRepository;
use App\Repositories\CourseRepository;
use App\Repositories\JobCategoryRepository;
use App\Repositories\JobPostRepository;
use App\Repositories\JobTypeRepository;
use App\Repositories\TestimonialRepository;
use App\Repositories\UniversityRepository;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
            JobPostCreated::class,
            SendJobPostCreatedNotification::class
        );
        Event::listen(
            JobPostUpdated::class,
            SendJobPostUpdatedNotification::class
        );

        // Course notifications dispatch their Jobs directly from
        // CourseService (no events / listeners).
        $this->app->bind(BlogRepositoryInterface::class, BlogRepository::class);
        $this->app->bind(UniversityRepositoryInterface::class, UniversityRepository::class);
        $this->app->bind(AcademyRepositoryInterface::class, AcademyRepository::class);
        $this->app->bind(CourseCategoryRepositoryInterface::class, CourseCategoryRepository::class);
        $this->app->bind(CourseRepositoryInterface::class, CourseRepository::class);
        $this->app->bind(JobTypeRepositoryInterface::class, JobTypeRepository::class);
        $this->app->bind(JobCategoryRepositoryInterface::class, JobCategoryRepository::class);
        $this->app->bind(JobPostRepositoryInterface::class, JobPostRepository::class);
        $this->app->bind(TestimonialRepositoryInterface::class, TestimonialRepository::class);

        Gate::policy(Blog::class, BlogPolicy::class);
        Gate::policy(University::class, UniversityPolicy::class);
        Gate::policy(Academy::class, AcademyPolicy::class);
        Gate::policy(CourseCategory::class, CourseCategoryPolicy::class);
        Gate::policy(Course::class, CoursePolicy::class);
        Gate::policy(JobType::class, JobTypePolicy::class);
        Gate::policy(JobCategory::class, JobCategoryPolicy::class);
        Gate::policy(JobPost::class, JobPostPolicy::class);
        Gate::policy(Testimonial::class,TestimonialPolicy::class);

        Blog::observe(BlogObserver::class);
        University::observe(UniversityObserver::class);
        Academy::observe(AcademyObserver::class);
        CourseCategory::observe(CourseCategoryObserver::class);
        Course::observe(CourseObserver::class);
        JobType::observe(JobTypeObserver::class);
        JobCategory::observe(JobCategoryObserver::class);
        JobPost::observe(JobPostObserver::class);
    }
}
