<?php

namespace App\Repositories;

use App\Models\Testimonial;
use App\Repositories\Contracts\TestimonialRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class TestimonialRepository implements TestimonialRepositoryInterface
{

    public function create(array $data): Testimonial
    {
        return Testimonial::create($data);
    }

    public function update(Testimonial $testimonial, array $data): Testimonial
    {
        $testimonial->update($data);
        return $testimonial->fresh();
    }

    public function delete(Testimonial $testimonial): bool
    {
        if ($testimonial->image) {
          Storage::disk("public")->delete($testimonial->image);
        }
        return $testimonial->delete();
    }
}
