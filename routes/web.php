<?php

use App\Http\Controllers\Admin\AcademyController;
use App\Http\Controllers\Admin\AdminSiteSettingController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CourseCategoryController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\JobCategoryController;
use App\Http\Controllers\Admin\JobPostController;
use App\Http\Controllers\Admin\JobTypeController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\UniversityController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use App\Models\Academy;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\Permission;
use App\Models\Role;
use App\Models\University;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');
// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard', [
            'stats' => [
                'users' => User::count(),
                'roles' => Role::count(),
                'permissions' => Permission::count(),
                'blogs' => Blog::count(),
                'blogCategories' => BlogCategory::count(),
                'universities' => University::count(),
                'academies' => Academy::count(),
                'courseCategories' => CourseCategory::count(),
                'courses' => Course::count(),
            ],
        ]);
    })->name('dashboard');

    // Route::get('/partners', function () {
    //     return view('admin.index', [
    //         'title' => 'Partners',
    //         'description' => 'Manage Partners from here.',
    //     ]);
    // })->middleware('can:view-partners')->name('partners.index');

    Route::controller(PartnerController::class)->prefix('partners')->name('partners.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{partner}/edit', 'edit')->name('edit');
        Route::put('/{partner}', 'update')->name('update');
        Route::delete('/{partner}', 'destroy')->name('destroy');
    });

    Route::controller(TestimonialController::class)->prefix('testimonials')->name('testimonials.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{testimonial}/edit', 'edit')->name('edit');
        Route::put('/{testimonial}', 'update')->name('update');
        Route::delete('/{testimonial}', 'destroy')->name('destroy');
    });

    Route::controller(JobPostController::class)->prefix('job-posts')->name('job-posts.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{jobPost}/edit', 'edit')->name('edit');
        Route::put('/{jobPost}', 'update')->name('update');
        Route::delete('/{jobPost}', 'destroy')->name('destroy');
    });

    Route::controller(JobCategoryController::class)->prefix('job-categories')->name('job-categories.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{jobCategory}/edit', 'edit')->name('edit');
        Route::put('/{jobCategory}', 'update')->name('update');
        Route::delete('/{jobCategory}', 'destroy')->name('destroy');
    });

    Route::controller(JobTypeController::class)->prefix('job-types')->name('job-types.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{jobType}/edit', 'edit')->name('edit');
        Route::put('/{jobType}', 'update')->name('update');
        Route::delete('/{jobType}', 'destroy')->name('destroy');
    });

    Route::controller(CourseController::class)->prefix('courses')->name('courses.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{course}/edit', 'edit')->name('edit');
        Route::put('/{course}', 'update')->name('update');
        Route::delete('/{course}', 'destroy')->name('destroy');
    });

    Route::controller(CourseCategoryController::class)->prefix('course-categories')->name('course-categories.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{courseCategory}/edit', 'edit')->name('edit');
        Route::put('/{courseCategory}', 'update')->name('update');
        Route::delete('/{courseCategory}', 'destroy')->name('destroy');
    });

    Route::controller(AcademyController::class)->prefix('academies')->name('academies.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{academy}/edit', 'edit')->name('edit');
        Route::put('/{academy}', 'update')->name('update');
        Route::delete('/{academy}', 'destroy')->name('destroy');
    });

    Route::controller(UniversityController::class)->prefix('universities')->name('universities.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{university}/edit', 'edit')->name('edit');
        Route::put('/{university}', 'update')->name('update');
        Route::delete('/{university}', 'destroy')->name('destroy');
    });
    

    Route::controller(BlogController::class)->prefix('blogs')->name('blogs.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{blog}/edit', 'edit')->name('edit');
        Route::put('/{blog}', 'update')->name('update');
        Route::delete('/{blog}', 'destroy')->name('destroy');
    });

    Route::get('/blog-categories', [BlogCategoryController::class, 'index'])
        ->middleware('can:view-blog-categories')->name('blog-categories.index');
    Route::get('/blog-categories/create', [BlogCategoryController::class, 'create'])
        ->middleware('can:create-blog-categories')->name('blog-categories.create');
    Route::post('/blog-categories', [BlogCategoryController::class, 'store'])
        ->middleware('can:create-blog-categories')->name('blog-categories.store');
    Route::get('/blog-categories/{blogCategory}/edit', [BlogCategoryController::class, 'edit'])
        ->middleware('can:edit-blog-categories')->name('blog-categories.edit');
    Route::put('/blog-categories/{blogCategory}', [BlogCategoryController::class, 'update'])
        ->middleware('can:edit-blog-categories')->name('blog-categories.update');
    Route::delete('/blog-categories/{blogCategory}', [BlogCategoryController::class, 'destroy'])
        ->middleware('can:delete-blog-categories')->name('blog-categories.destroy');

    Route::get('/users', [UserController::class, 'index'])
        ->middleware('can:view-users')->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])
        ->middleware('can:create-users')->name('users.create');
    Route::post('/users', [UserController::class, 'store'])
        ->middleware('can:create-users')->name('users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])
        ->middleware('can:edit-users')->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])
        ->middleware('can:edit-users')->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])
        ->middleware('can:delete-users')->name('users.destroy');

    Route::get('/roles', [RoleController::class, 'index'])
        ->middleware('can:view-roles')->name('roles.index');
    Route::get('/roles/create', [RoleController::class, 'create'])
        ->middleware('can:create-roles')->name('roles.create');
    Route::post('/roles', [RoleController::class, 'store'])
        ->middleware('can:create-roles')->name('roles.store');
    Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])
        ->middleware('can:edit-roles')->name('roles.edit');
    Route::put('/roles/{role}', [RoleController::class, 'update'])
        ->middleware('can:edit-roles')->name('roles.update');
    Route::delete('/roles/{role}', [RoleController::class, 'destroy'])
        ->middleware('can:delete-roles')->name('roles.destroy');

    Route::get('/permissions', [PermissionController::class, 'index'])
        ->middleware('can:view-permissions')->name('permissions.index');
    Route::get('/permissions/create', [PermissionController::class, 'create'])
        ->middleware('can:create-permissions')->name('permissions.create');
    Route::post('/permissions', [PermissionController::class, 'store'])
        ->middleware('can:create-permissions')->name('permissions.store');
    Route::get('/permissions/{permission}/edit', [PermissionController::class, 'edit'])
        ->middleware('can:edit-permissions')->name('permissions.edit');
    Route::put('/permissions/{permission}', [PermissionController::class, 'update'])
        ->middleware('can:edit-permissions')->name('permissions.update');
    Route::delete('/permissions/{permission}', [PermissionController::class, 'destroy'])
        ->middleware('can:delete-permissions')->name('permissions.destroy');

    Route::get('site-settings', [AdminSiteSettingController::class, 'edit'])
        ->middleware('can:edit-site-settings')->name('site-settings.edit');
    Route::put('site-settings', [AdminSiteSettingController::class, 'update'])
        ->middleware('can:edit-site-settings')->name('site-settings.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
