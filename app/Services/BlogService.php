<?php

namespace App\Services;

use App\Models\Blog;
use App\Repositories\Contracts\BlogRepositoryInterface;
use App\Events\BlogCreated;
use App\Events\BlogUpdated;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogService
{
    protected BlogRepositoryInterface $repository;

    public function __construct(
        BlogRepositoryInterface $repository
    ) {
        $this->repository = $repository;
    }

    /**
     * Create a blog post.
     */
    public function create(array $data, ?UploadedFile $featureImage = null): Blog
    {

        /*
        |--------------------------------------------------------------------------
        | Upload feature image
        |--------------------------------------------------------------------------
        */

        if ($featureImage) {
            $data['feature_image'] = $featureImage->store(
                'blogs',
                'public'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Current authenticated user
        |--------------------------------------------------------------------------
        */

        $data['user_id'] = Auth::id();

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
        | Create Blog through Repository
        |--------------------------------------------------------------------------
        */

        $blog = $this->repository->create($data);

        /*
        |--------------------------------------------------------------------------
        | Fire Event
        |--------------------------------------------------------------------------
        */

        event(new BlogCreated($blog));

        return $blog;
    }

    public function update(Blog $blog, array $data, ?UploadedFile $featureImage = null): Blog
    {
        if ($featureImage) {
            if ($blog->feature_image) {
                Storage::disk('public')->delete($blog->feature_image);
            }
            $data['feature_image'] = $featureImage->store('blogs', 'public');
        }

        $blog= $this->repository->update($blog, $data);
        event(new BlogUpdated($blog));
        return $blog;
        
    }

    public function delete(Blog $blog): bool
    {
        return $this->repository->delete($blog);
    }
}
