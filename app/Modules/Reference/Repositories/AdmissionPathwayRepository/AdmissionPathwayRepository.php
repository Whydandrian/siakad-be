<?php

namespace App\Modules\Reference\Repositories\AdmissionPathwayRepository;

use App\Models\AdmissionPathway;
use App\Modules\Reference\Repositories\AdmissionPathwayRepository\AdmissionPathwayInterface;

class AdmissionPathwayRepository implements AdmissionPathwayInterface
{
    public function all()
    {
        return AdmissionPathway::all();
    }

    public function find(int $id): ?AdmissionPathway
    {
        return AdmissionPathway::find($id);
    }

    public function create(array $data): AdmissionPathway
    {
        return AdmissionPathway::create($data);
    }

    public function update(int $id, array $data): bool
    {
        $item = $this->find($id);
        return $item ? $item->update($data) : false;
    }

    public function delete(int $id): bool
    {
        $item = $this->find($id);
        return $item ? $item->delete() : false;
    }
}
