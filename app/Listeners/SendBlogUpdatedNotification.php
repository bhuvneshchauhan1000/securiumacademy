<?php

namespace App\Listeners;

use App\Events\BlogUpdated;
use App\Jobs\ProcessBlogUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Support\Facades\Log;
class SendBlogUpdatedNotification
{
    public Blog $blog;
    public User $user;
    /**
     * Create the event listener.
     */
    public function __construct(Blog $blog, User $user)
    {
        //
        $this->blog = $blog;
        $this->user = $user;
    }

    /**
     * Handle the event.
     */
    public function handle(BlogUpdated $event): void
    {
        // who are not admin
        $users = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'admin');
        })->get();
        foreach ($users as $user) {
            ProcessBlogUpdated::dispatch(
                $event->blog,
                $user
            );
        }
    }
}
