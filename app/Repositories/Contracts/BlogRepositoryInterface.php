<?php

namespace App\Repositories\Contracts;

use App\Models\Blog;

interface BlogRepositoryInterface
{
    public function create(array $data): Blog;
    public function update(Blog $blog, array $data): Blog;
    public function delete(Blog $blog): bool;
}
