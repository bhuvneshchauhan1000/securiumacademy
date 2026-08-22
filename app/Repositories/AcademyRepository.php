<?php

namespace App\Repositories;

use App\Models\Academy;
use App\Repositories\Contracts\AcademyRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class AcademyRepository implements AcademyRepositoryInterface
{

    public function create(array $data): Academy
    {
        return Academy::create($data);
    }

    public function update(Academy $academy, array $data): Academy
    {
        $academy->update($data);
        return $academy->fresh();
    }

    public function delete(Academy $academy): bool
    {
        if ($academy->logo) {
          Storage::disk("public")->delete($academy->logo);
        }
        return $academy->delete();
    }
}