<?php

namespace App\Listeners;

use App\Events\JobPostCreated;
use App\Jobs\ProcessJobPostCreated;
use App\Models\User;

class SendJobPostCreatedNotification
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
    public function handle(JobPostCreated $event): void
    {
        // Notify all users who are not admins
        $users = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'admin');
        })->get();

        foreach ($users as $user) {
            ProcessJobPostCreated::dispatch(
                $event->jobPost,
                $user
            );
        }
    }
}
