<?php

namespace App\Repositories\Contracts;

use App\Models\JobCategory;

interface JobCategoryRepositoryInterface
{
    public function create(array $data): JobCategory;

    public function update(JobCategory $jobCategory, array $data): JobCategory;

    public function delete(JobCategory $jobCategory): bool;
}
