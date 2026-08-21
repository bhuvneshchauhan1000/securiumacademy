<?php

namespace App\Services;

use App\Models\University;
use App\Repositories\Contracts\UniversityRepositoryInterface;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UniversityService{
    private UniversityRepositoryInterface $repository;

    public function __construct(UniversityRepositoryInterface $repository){
        $this->repository = $repository;
    }

    public function create(array $data , ?UploadedFile $logo = null): University
    {
        if($logo){
            $data["logo"] = $logo->store("university","public");
        }
        $university = $this->repository->create($data);

        return $university;
    }

    public function update(University $university, array $data , ?UploadedFile $logo = null): University
    {
        if($logo){
            if($university->logo){
                $data["logo"] = $logo->store("university","public");
            }

        }
        $university = $this->repository->update($university, $data);
        return $university;
    }

    public function delete(University $university): bool
    {
        return $this->repository->delete($university);
    }
}
