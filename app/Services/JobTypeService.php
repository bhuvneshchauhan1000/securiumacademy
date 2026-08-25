<?php

namespace App\Services;

use App\Models\JobType;
use App\Repositories\Contracts\JobTypeRepositoryInterface;

class JobTypeService
{
    protected JobTypeRepositoryInterface $repository;

    public function __construct(
        JobTypeRepositoryInterface $repository
    ) {
        $this->repository = $repository;
    }

    /**
     * Create a job type.
     */
    public function create(array $data): JobType
    {
        return $this->repository->create($data);
    }

    /**
     * Update a job type.
     */
    public function update(JobType $jobType, array $data): JobType
    {
        return $this->repository->update($jobType, $data);
    }

    /**
     * Delete a job type.
     */
    public function delete(JobType $jobType): bool
    {
        return $this->repository->delete($jobType);
    }
}
