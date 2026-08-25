<?php

namespace App\Repositories;

use App\Models\JobPost;
use App\Repositories\Contracts\JobPostRepositoryInterface;

class JobPostRepository implements JobPostRepositoryInterface
{
    public function create(array $data): JobPost
    {
        return JobPost::create($data);
    }

    public function update(JobPost $jobPost, array $data): JobPost
    {
        $jobPost->update($data);

        return $jobPost->fresh();
    }

    public function delete(JobPost $jobPost): bool
    {
        return $jobPost->delete();
    }
}
