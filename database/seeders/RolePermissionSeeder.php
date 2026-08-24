<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]
            ->forgetCachedPermissions();

        /*
        |--------------------------------------------------------------------------
        | Permissions
        |--------------------------------------------------------------------------
        */

        $permissions = [
            // Dashboard
            'view-dashboard',

            //course category

            'view-course-categories',
            'create-course-categories',
            'edit-course-categories',
            'delete-course-categories',

            //Academy
            'view-academies',
            'create-academies',
            'edit-academies',
            'delete-academies',

            //University
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

            //site settings
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