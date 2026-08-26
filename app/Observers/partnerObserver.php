<?php

namespace App\Observers;

use App\Models\Partner;
use Illuminate\Support\Str;
class partnerObserver
{

public function creating(Partner $partner)
    {
        $slug = Str::slug($partner->name);
        $originalSlug = $slug;
        $counter = 1;
        while (Partner::where('slug', $slug)->exists()) {
            $counter++;
            $slug = $originalSlug.'-'.$counter;
        }
        $partner->slug = $slug;
    }

    public function updating(Partner $partner)
    {
        if ($partner->isDirty('name')) {
            $slug = Str::slug($partner->name);
            $baseSlug = $slug;
            $counter = 1;
            while (Partner::where('slug', $slug)->where('id', '!=', $partner->id)->exists()) {
                $counter++;
                $slug = $baseSlug.'-'.$counter;
            }
            $partner->slug = $slug;
        }
    }
    /**
     * Handle the Partner "created" event.
     */
    public function created(Partner $partner): void
    {
        //
    }

    /**
     * Handle the Partner "updated" event.
     */
    public function updated(Partner $partner): void
    {
        //
    }

    /**
     * Handle the Partner "deleted" event.
     */
    public function deleted(Partner $partner): void
    {
        //
    }

    /**
     * Handle the Partner "restored" event.
     */
    public function restored(Partner $partner): void
    {
        //
    }

    /**
     * Handle the Partner "force deleted" event.
     */
    public function forceDeleted(Partner $partner): void
    {
        //
    }
}
