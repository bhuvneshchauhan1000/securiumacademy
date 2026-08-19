<?php

namespace App\Listeners;

use App\Events\BlogCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Jobs\ProcessBlogCreated;
use App\Models\User;

class SendBlogCreatedNotification
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
    public function handle(BlogCreated $event): void
    {
        // who are not admin
        $users = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'admin');
        })->get();
        foreach ($users as $user) {
            ProcessBlogCreated::dispatch(
                $event->blog,
                $user
            );
        }
    }
}
