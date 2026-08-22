<?php

namespace App\Repositories;

use App\Models\University;
use App\Repositories\Contracts\UniversityRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class UniversityRepository implements UniversityRepositoryInterface
{
    public function create(array $data): University
    {
        return University::create($data);
    }
    public function update(University $university, array $data): University
    {
        
        $university->update($data);

        return $university->fresh();
    }


    public function delete(University $university): bool
    {
        if ($university->logo) {
            Storage::disk('public')->delete($university->logo);
        }
        return $university->delete();
    }
}
