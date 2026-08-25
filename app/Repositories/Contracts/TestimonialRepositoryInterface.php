<?php

namespace App\Repositories\Contracts;

use App\Models\Testimonial;

interface TestimonialRepositoryInterface
{
    public function create(array $data): Testimonial;
    public function update(Testimonial $testimonial, array $data): Testimonial;
    public function delete(Testimonial $testimonial): bool;
}
