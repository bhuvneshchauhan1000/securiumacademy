<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]
            ->forgetCachedPermissions();

        /*
        |--------------------------------------------------------------------------
        | Permissions
        |--------------------------------------------------------------------------
        */

        $permissions = [
            // Dashboard
            'view-dashboard',

            //testimonials

            'view-testimonials',
            'create-testimonials',
            'edit-testimonials',
            'delete-testimonials',

            //job posts
            'view-job-posts',
            'create-job-posts',
            'edit-job-posts',
            'delete-job-posts',

            // job categoried
            'view-job-categories',
            'create-job-categories',
            'edit-job-categories',
            'delete-job-categories',

            // job type

            'view-job-types',
            'create-job-types',
            'edit-job-types',
            'delete-job-types',

            // job category

            'view-job-categories',
            'create-job-categories',
            'edit-job-categories',
            'delete-job-categories',

            // courses
            'view-courses',
            'create-courses',
            'edit-courses',
            'delete-courses',

            // course category
            'view-course-categories',
            'create-course-categories',
            'edit-course-categories',
            'delete-course-categories',

            // Academy
            'view-academies',
            'create-academies',
            'edit-academies',
            'delete-academies',

            // University
            'view-universities',
            'create-universities',
            'edit-universities',
            'delete-universities',

            // Blogs
            'view-blogs',
            'create-blogs',
            'edit-blogs',
            'delete-blogs',

            // Blog Categories
            'view-blog-categories',
            'create-blog-categories',
            'edit-blog-categories',
            'delete-blog-categories',

            // site settings
            'edit-site-settings',

            // Users
            'view-users',
            'create-users',
            'edit-users',
            'delete-users',

            // Roles
            'view-roles',
            'create-roles',
            'edit-roles',
            'delete-roles',

            // Permissions
            'view-permissions',
            'create-permissions',
            'edit-permissions',
            'delete-permissions',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Roles
        |--------------------------------------------------------------------------
        */

        $admin = Role::firstOrCreate([
            'name' => 'admin',
            'guard_name' => 'web',
        ]);

        $editor = Role::firstOrCreate([
            'name' => 'editor',
            'guard_name' => 'web',
        ]);

        $author = Role::firstOrCreate([
            'name' => 'author',
            'guard_name' => 'web',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Admin Permissions
        |--------------------------------------------------------------------------
        */

        $admin->syncPermissions($permissions);

        /*
        |--------------------------------------------------------------------------
        | Editor Permissions
        |--------------------------------------------------------------------------
        */

        $editor->syncPermissions([
            'view-dashboard',

            'view-blogs',
            'create-blogs',
            'edit-blogs',
            'delete-blogs',

            'view-blog-categories',
            'create-blog-categories',
            'edit-blog-categories',
            'delete-blog-categories',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Author Permissions
        |--------------------------------------------------------------------------
        */

        $author->syncPermissions([
            'view-dashboard',

            'view-blogs',
            'create-blogs',
            'edit-blogs',
        ]);

        $this->command->info('Role Permission seeding Complete successfully');
    }
}
