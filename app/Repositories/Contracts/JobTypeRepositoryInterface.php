<?php

namespace App\Repositories\Contracts;

use App\Models\JobType;

interface JobTypeRepositoryInterface
{
    public function create(array $data): JobType;

    public function update(JobType $jobType, array $data): JobType;

    public function delete(JobType $jobType): bool;
}
