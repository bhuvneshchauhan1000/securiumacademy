<?php

namespace App\Repositories;

use App\Models\Blog;
use App\Repositories\Contracts\BlogRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class BlogRepository implements BlogRepositoryInterface
{
    public function create(array $data): Blog
    {
        return Blog::create($data);
    }

    public function update(Blog $blog, array $data): Blog
    {
        $blog->update($data);
        return $blog->fresh();
    }

    public function delete(Blog $blog): bool
    {
        if ($blog->feature_image) {
            Storage::disk('public')->delete($blog->feature_image);
        }
        return $blog->delete();
    }
}
