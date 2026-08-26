<?php

namespace App\Repositories;

use App\Models\Partner;
use App\Repositories\Contracts\PartnerRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class PartnerRepository implements PartnerRepositoryInterface
{

    public function create(array $data): Partner
    {
        return Partner::create($data);
    }

    public function update(Partner $partner, array $data): Partner
    {
        $partner->update($data);
        return $partner->fresh();
    }

    public function delete(Partner $partner): bool
    {
        if ($partner->logo) {
          Storage::disk("public")->delete($partner->logo);
        }
        return $partner->delete();
    }
}
