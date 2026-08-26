<?php

namespace App\Repositories\Contracts;

use App\Models\Partner;

interface PartnerRepositoryInterface
{
    public function create(array $data): Partner;
    public function update(Partner $partner, array $data): Partner;
    public function delete(Partner $partner): bool;
}
