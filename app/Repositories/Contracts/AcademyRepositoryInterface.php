<?php

namespace App\Repositories\Contracts;

use App\Models\Academy;

interface AcademyRepositoryInterface
{
    public function create (array $data): Academy;
    public function update (Academy $academy, array $data): Academy;
    public function delete (Academy $academy): bool;
}