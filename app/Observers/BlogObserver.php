<?php

namespace App\Observers;

use App\Models\Blog;
use Illuminate\Support\Str;

class BlogObserver
{
    /**
     * Handle the Blog "created" event.
     */

    public function creating(Blog $blog): void
    {
        $slug = Str::slug($blog->title);

        $originalSlug = $slug;
        $counter = 1;

        while (Blog::where('slug', $slug)->exists()) {
            $counter++;
            $slug = $originalSlug . '-' . $counter;
        }

        $blog->slug = $slug;
    }


    public function updating(Blog $blog): void
    {
        if ($blog->isDirty('title')) {
            $baseSlug = Str::slug($blog->title);
            $slug = $baseSlug;
            $counter = 1;

            while (
                Blog::where('slug', $slug)
                    ->where('id', '!=', $blog->id)
                    ->exists()
            ) {
                $counter++;
                $slug = $baseSlug . '-' . $counter;
            }

            $blog->slug = $slug;
        }
    }


    public function created(Blog $blog): void
    {
        //
    }

    /**
     * Handle the Blog "updated" event.
     */
    public function updated(Blog $blog): void
    {
        //
    }

    /**
     * Handle the Blog "deleted" event.
     */
    public function deleted(Blog $blog): void
    {
        //
    }

    /**
     * Handle the Blog "restored" event.
     */
    public function restored(Blog $blog): void
    {
        //
    }

    /**
     * Handle the Blog "force deleted" event.
     */
    public function forceDeleted(Blog $blog): void
    {
        //
    }
}
