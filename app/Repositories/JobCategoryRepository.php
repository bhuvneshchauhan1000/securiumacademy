<?php

namespace App\Repositories;

use App\Models\JobCategory;
use App\Repositories\Contracts\JobCategoryRepositoryInterface;

class JobCategoryRepository implements JobCategoryRepositoryInterface
{
    public function create(array $data): JobCategory
    {
        return JobCategory::create($data);
    }

    public function update(JobCategory $jobCategory, array $data): JobCategory
    {
        $jobCategory->update($data);

        return $jobCategory->fresh();
    }

    public function delete(JobCategory $jobCategory): bool
    {
        return $jobCategory->delete();
    }
}
