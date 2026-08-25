<?php

namespace App\Services;
use App\Models\Testimonial;
use App\Repositories\Contracts\TestimonialRepositoryInterface;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class TestimonialService
{
    private TestimonialRepositoryInterface $testimonialRepository;

    public function __construct(TestimonialRepositoryInterface $testimonialRepository)
    {
        $this->testimonialRepository = $testimonialRepository;
    }

    public function create(array $data, ?UploadedFile $image = null): Testimonial
    {
        if ($image) {
            $data["image"] = $image->store('testimonials', 'public');
        }
        $testimonials = $this->testimonialRepository->create($data);
        return $testimonials;
    }

    public function update(Testimonial $testimonial, array $data, ?UploadedFile $image = null): Testimonial
    {
        if ($image) {
          if($testimonial->image)
            {
                Storage::disk('public')->delete($testimonial->image);
            }
            $data['image'] = $image->store('testimonials','public');
        }
        $testimonials = $this->testimonialRepository->update($testimonial, $data);
        return $testimonials;
    }

    public function delete (Testimonial $testimonial): bool
    {
        return $this->testimonialRepository->delete($testimonial);
    }
 

}
