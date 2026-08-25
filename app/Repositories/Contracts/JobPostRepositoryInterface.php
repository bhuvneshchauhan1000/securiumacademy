<?php

namespace App\Repositories\Contracts;

use App\Models\JobPost;

interface JobPostRepositoryInterface
{
    public function create(array $data): JobPost;

    public function update(JobPost $jobPost, array $data): JobPost;

    public function delete(JobPost $jobPost): bool;
}
