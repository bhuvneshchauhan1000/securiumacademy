<?php

namespace App\Services;

use App\Models\JobCategory;
use App\Repositories\Contracts\JobCategoryRepositoryInterface;

class JobCategoryService
{
    protected JobCategoryRepositoryInterface $repository;

    public function __construct(
        JobCategoryRepositoryInterface $repository
    ) {
        $this->repository = $repository;
    }

    /**
     * Create a job category.
     */
    public function create(array $data): JobCategory
    {
        return $this->repository->create($data);
    }

    /**
     * Update a job category.
     */
    public function update(JobCategory $jobCategory, array $data): JobCategory
    {
        return $this->repository->update($jobCategory, $data);
    }

    /**
     * Delete a job category.
     */
    public function delete(JobCategory $jobCategory): bool
    {
        return $this->repository->delete($jobCategory);
    }
}
