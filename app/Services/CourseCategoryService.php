<?php

namespace App\Services;
use App\Models\CourseCategory;
use App\Repositories\Contracts\CourseCategoryRepositoryInterface;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class CourseCategoryService
{
    private CourseCategoryRepositoryInterface $courseRepository;

    public function __construct(CourseCategoryRepositoryInterface $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }

    public function create(array $data, ?UploadedFile $logo = null): CourseCategory
    {
        if ($logo) {
            $data["logo"] = $logo->store('course-category', 'public');
        }
        $courseCategory = $this->courseRepository->create($data);
        return $courseCategory;
    }

    public function update(CourseCategory $courseCategory, array $data, ?UploadedFile $logo = null): CourseCategory
    {
        if ($logo) {
          if($courseCategory->logo)
            {
                Storage::disk('public')->delete($courseCategory->logo);
            }
            $data['logo'] = $logo->store('course-category','public');
        }
        $courseCategory = $this->courseRepository->update($courseCategory, $data);
        return $courseCategory;
    }

    public function delete (CourseCategory $courseCategory): bool
    {
        return $this->courseRepository->delete($courseCategory);
    }
 


}