<?php

use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminSiteSettingController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\UniversityController;
use App\Http\Controllers\Admin\AcademyController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard', [
            'stats' => [
                'users' => \App\Models\User::count(),
                'roles' => \App\Models\Role::count(),
                'permissions' => \App\Models\Permission::count(),
                'blogs' => \App\Models\Blog::count(),
                'blogCategories' => \App\Models\BlogCategory::count(),
                'universities' => \App\Models\University::count(),
                'academies' => \App\Models\Academy::count(),
            ],
        ]);
    })->name('dashboard');

    // Route::get('/academies', function () {
    //     return view('admin.index', [
    //         'title' => 'Academy',
    //         'description' => 'Manage Academy from here.',
    //     ]);
    // })->middleware('can:view-academies')->name('academies.index');

    Route::controller(AcademyController::class)->prefix('academies')->name('academies.')->group(function () {

        Route::get('/', 'index')->name('index');

        Route::get('/create', 'create')->name('create');

        Route::post('/', 'store')->name('store');

        Route::get('/{academy:slug}', 'show')->name('show');

        Route::get('/{academy}/edit', 'edit')->name('edit');

        Route::put('/{academy}', 'update')->name('update');

        Route::delete('/{academy}', 'destroy')->name('destroy');
    });


    Route::get('/universities',[UniversityController::class,'index'])->name('universities.index');
    Route::get('/universities/create',[UniversityController::class,'create'])->name('universities.create');
    Route::post('/universities',[UniversityController::class,'store'])->name('universities.store');
    Route::get('/universities/{university}/edit', [UniversityController::class, 'edit'])->name('universities.edit');
    Route::put('/universities/{university}', [UniversityController::class, 'update'])->name('universities.update');
    Route::delete('/universities/{university}', [UniversityController::class, 'destroy'])->name('universities.destroy');

    Route::get('/blogs',[BlogController::class,'index'])->name('blogs.index');
    Route::get('/blogs/create',[BlogController::class,'create'])->name('blogs.create');
    Route::post('/blogs',[BlogController::class,'store'])->name('blogs.store');
    Route::get('/blogs/{blog}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
    Route::put('/blogs/{blog}', [BlogController::class, 'update'])->name('blogs.update');
    Route::delete('/blogs/{blog}', [BlogController::class, 'destroy'])->name('blogs.destroy');

    Route::get('/blog-categories',[BlogCategoryController::class,'index'])
    ->middleware('can:view-blog-categories')->name('blog-categories.index');
    Route::get('/blog-categories/create',[BlogCategoryController::class,'create'])
    ->middleware('can:create-blog-categories')->name('blog-categories.create');
    Route::post('/blog-categories',[BlogCategoryController::class,'store'])
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
