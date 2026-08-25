<?php

namespace App\Listeners;

use App\Events\JobPostUpdated;
use App\Jobs\ProcessJobPostUpdated;
use App\Models\User;

class SendJobPostUpdatedNotification
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
    public function handle(JobPostUpdated $event): void
    {
        // Notify all users who are not admins
        $users = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'admin');
        })->get();

        foreach ($users as $user) {
            ProcessJobPostUpdated::dispatch(
                $event->jobPost,
                $user
            );
        }
    }
}
