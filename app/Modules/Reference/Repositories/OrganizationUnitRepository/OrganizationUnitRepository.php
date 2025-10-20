<?php

namespace App\Modules\Reference\Repositories\OrganizationUnitRepository;

use App\Models\OrganizationUnit;
use App\Modules\Reference\Repositories\OrganizationUnitRepository\OrganizationUnitInterface;

class OrganizationUnitRepository implements OrganizationUnitInterface
{
    public function all()
    {
        return OrganizationUnit::all();
    }

    public function find(int $id): ?OrganizationUnit
    {
        return OrganizationUnit::find($id);
    }

    public function create(array $data): OrganizationUnit
    {
        return OrganizationUnit::create($data);
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
