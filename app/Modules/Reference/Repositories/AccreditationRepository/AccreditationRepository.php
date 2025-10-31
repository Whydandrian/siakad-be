<?php

namespace App\Modules\Reference\Repositories\AccreditationRepository;

use App\Models\Accreditation;
use App\Modules\Reference\Repositories\AccreditationRepository\AccreditationInterface;

class AccreditationRepository implements AccreditationInterface
{
    public function all()
    {
        return Accreditation::all();
    }

    public function find(int $id): ?Accreditation
    {
        return Accreditation::find($id);
    }

    public function create(array $data): Accreditation
    {
        return Accreditation::create($data);
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
