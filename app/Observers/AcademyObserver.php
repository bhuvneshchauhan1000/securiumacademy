<?php

namespace App\Observers;

use App\Models\Academy;
use Illuminate\Support\Str;

class AcademyObserver
{
    /**
     * Handle the Academy "created" event.
     */

    public function creating(Academy $academy)
    {
        $slug = Str::slug($academy->name);
        $originalSlug = $slug;
        $counter = 1;
        while (Academy::where('slug', $slug)->exists()) {
            $counter++;
            $slug = $originalSlug . '-' . $counter;
        }
        $academy->slug = $slug;
    }
    public function updating(Academy $academy): void
    {
        if ($academy->isDirty('name')) {
            $baseSlug = Str::slug($academy->name);
            $slug = $baseSlug;
            $counter = 1;

            while (
                Academy::where('slug', $slug)
                    ->where('id', '!=', $academy->id)
                    ->exists()
            ) {
                $counter++;
                $slug = $baseSlug . '-' . $counter;
            }

            $academy->slug = $slug;
        }
    }

    public function created(Academy $academy): void
    {
        //
    }

    /**
     * Handle the Academy "updated" event.
     */
    public function updated(Academy $academy): void
    {
        //
    }

    /**
     * Handle the Academy "deleted" event.
     */
    public function deleted(Academy $academy): void
    {
        //
    }

    /**
     * Handle the Academy "restored" event.
     */
    public function restored(Academy $academy): void
    {
        //
    }

    /**
     * Handle the Academy "force deleted" event.
     */
    public function forceDeleted(Academy $academy): void
    {
        //
    }
}
