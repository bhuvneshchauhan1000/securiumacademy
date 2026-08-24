<?php

namespace App\Repositories\Contracts;

use App\Models\CourseCategory;

interface CourseCategoryRepositoryInterface
{
    public function create (array $data): CourseCategory;
    public function update (CourseCategory $courseCategory, array $data): CourseCategory;
    public function delete (CourseCategory $courseCategory): bool;
}