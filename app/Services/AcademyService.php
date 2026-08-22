<?php

namespace App\Services;
use App\Models\Academy;
use App\Repositories\Contracts\AcademyRepositoryInterface;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class AcademyService
{
    private AcademyRepositoryInterface $academyRepository;

    public function __construct(AcademyRepositoryInterface $academyRepositiory)
    {
        $this->academyRepository = $academyRepositiory;
    }

    public function create(array $data, ?UploadedFile $logo = null): Academy
    {
        if ($logo) {
            $data["logo"] = $logo->store('academies', 'public');
        }
        $academies = $this->academyRepository->create($data);
        return $academies;
    }

    public function update(Academy $academy, array $data, ?UploadedFile $logo = null): Academy
    {
        if ($logo) {
          if($academy->logo)
            {
                Storage::disk('public')->delete($academy->logo);
            }
            $data['logo'] = $logo->store('academies','public');
        }
        $academies = $this->academyRepository->update($academy, $data);
        return $academies;
    }

    public function delete (Academy $academy): bool
    {
        return $this->academyRepository->delete($academy);
    }
 


}