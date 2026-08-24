<?php

namespace App\Listeners;

use App\Events\CourseCreated;
use App\Jobs\ProcessCourseCreated;
use App\Models\User;

class SendCourseCreatedNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CourseCreated $event): void
    {
        // who are not admin
        $users = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'admin');
        })->get();

        foreach ($users as $user) {
            ProcessCourseCreated::dispatch(
                $event->course,
                $user
            );
        }
    }
}
