<?php

namespace App\Listeners;

use App\Events\CourseUpdated;
use App\Jobs\ProcessCourseUpdated;
use App\Models\User;

class SendCourseUpdatedNotification
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
    public function handle(CourseUpdated $event): void
    {
        // who are not admin
        $users = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'admin');
        })->get();

        foreach ($users as $user) {
            ProcessCourseUpdated::dispatch(
                $event->course,
                $user
            );
        }
    }
}
