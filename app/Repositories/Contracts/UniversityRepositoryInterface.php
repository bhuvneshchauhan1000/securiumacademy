<?php

namespace App\Repositories\Contracts;

use App\Models\University;

interface UniversityRepositoryInterface
{
    public function create(array $data): University;
    public function update(University $university, array $data): University;
    public function delete(University $university): bool;

}