<?php

namespace App\Services;

use App\Models\Partner;
use App\Repositories\Contracts\PartnerRepositoryInterface;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class PartnerService
{
    private PartnerRepositoryInterface $partnerRepository;

    public function __construct(PartnerRepositoryInterface $partnerRepository)
    {
        $this->partnerRepository = $partnerRepository;
    }

    public function create(array $data, ?UploadedFile $logo = null): Partner
    {
        if ($logo) {
            $data["logo"] = $logo->store('partners', 'public');
        }
        $partners = $this->partnerRepository->create($data);
        return $partners;
    }

    public function update(Partner $partner, array $data, ?UploadedFile $logo = null): Partner
    {
        if ($logo) {
          if($partner->logo)
            {
                Storage::disk('public')->delete($partner->logo);
            }
            $data['logo'] = $logo->store('partners','public');
        }
        $partners = $this->partnerRepository->update($partner, $data);
        return $partners;
    }

    public function delete(Partner $partner): bool
    {
        return $this->partnerRepository->delete($partner);
    }
}
