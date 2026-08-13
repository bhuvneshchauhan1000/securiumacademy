<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        $admin = User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'admin',
                'password' => Hash::make('12345678'),
                'email_verified_at' => Date::now(),
                'remember_token' => Str::random(10),
            ]
        );

        $admin->assignRole('admin');


        // Editor
        $editor = User::updateOrCreate(
            ['email' => 'editor@gmail.com'],
            [
                'name' => 'editor',
                'password' => Hash::make('12345678'),
                'email_verified_at' => Date::now(),
                'remember_token' => Str::random(10),
            ]
        );

        $editor->assignRole('editor');


        // Author
        $author = User::updateOrCreate(
            ['email' => 'author@gmail.com'],
            [
                'name' => 'author',
                'password' => Hash::make('12345678'),
                'email_verified_at' => Date::now(),
                'remember_token' => Str::random(10),
            ]
        );

        $author->assignRole('author');
    }
}