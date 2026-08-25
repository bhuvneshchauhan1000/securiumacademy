<?php

namespace App\Services;

use App\Events\JobPostCreated;
use App\Events\JobPostUpdated;
use App\Models\JobPost;
use App\Repositories\Contracts\JobPostRepositoryInterface;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class JobPostService
{
    private JobPostRepositoryInterface $repository;

    public function __construct(
        JobPostRepositoryInterface $repository
    ) {
        $this->repository = $repository;
    }

    /**
     * Create a job post.
     */
    public function create(array $data, ?UploadedFile $companyLogo = null): JobPost
    {
        /*
        |--------------------------------------------------------------------------
        | Upload company logo
        |--------------------------------------------------------------------------
        */

        if ($companyLogo) {
            $data['company_logo'] = $companyLogo->store(
                'job-posts',
                'public'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Published At
        |--------------------------------------------------------------------------
        */

        if (
            isset($data['status']) &&
            $data['status'] === 'published' &&
            empty($data['published_at'])
        ) {
            $data['published_at'] = now();
        }

        /*
        |--------------------------------------------------------------------------
        | Create Job Post through Repository
        |--------------------------------------------------------------------------
        */

        $jobPost = $this->repository->create($data);

        /*
        |--------------------------------------------------------------------------
        | Fire Event
        |--------------------------------------------------------------------------
        */

        event(new JobPostCreated($jobPost));

        return $jobPost;
    }

    /**
     * Update a job post.
     */
    public function update(JobPost $jobPost, array $data, ?UploadedFile $companyLogo = null): JobPost
    {
        if ($companyLogo) {
            if ($jobPost->company_logo) {
                Storage::disk('public')->delete($jobPost->company_logo);
            }
            $data['company_logo'] = $companyLogo->store('job-posts', 'public');
        }

        $jobPost = $this->repository->update($jobPost, $data);

        event(new JobPostUpdated($jobPost));

        return $jobPost;
    }

    /**
     * Delete a job post.
     */
    public function delete(JobPost $jobPost): bool
    {
        if ($jobPost->company_logo) {
            Storage::disk('public')->delete($jobPost->company_logo);
        }

        return $this->repository->delete($jobPost);
    }
}
