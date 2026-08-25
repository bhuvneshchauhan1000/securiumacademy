<?php

namespace App\Repositories;

use App\Models\JobType;
use App\Repositories\Contracts\JobTypeRepositoryInterface;

class JobTypeRepository implements JobTypeRepositoryInterface
{
    public function create(array $data): JobType
    {
        return JobType::create($data);
    }

    public function update(JobType $jobType, array $data): JobType
    {
        $jobType->update($data);

        return $jobType->fresh();
    }

    public function delete(JobType $jobType): bool
    {
        return $jobType->delete();
    }
}
