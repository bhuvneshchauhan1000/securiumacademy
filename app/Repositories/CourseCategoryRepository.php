<?php

namespace App\Repositories;

use App\Models\CourseCategory;
use App\Repositories\Contracts\CourseCategoryRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class CourseCategoryRepository implements CourseCategoryRepositoryInterface
{
    public function create(array $data): CourseCategory
    {
        return CourseCategory::create($data);
    }

    public function update(CourseCategory $courseCategory, array $data): CourseCategory
    {
        $courseCategory->update($data);
        return $courseCategory->fresh();
    }

    public function delete(CourseCategory $courseCategory): bool
    {
        if ($courseCategory->logo) {
            Storage::disk("public")->delete($courseCategory->logo);
        }
        return $courseCategory->delete();
    }
}
