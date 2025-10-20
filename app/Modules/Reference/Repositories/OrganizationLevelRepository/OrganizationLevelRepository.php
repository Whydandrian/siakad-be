<?php

namespace App\Modules\Reference\Repositories\OrganizationLevelRepository;

use App\Models\OrganizationLevel;
use App\Modules\Reference\Repositories\OrganizationLevelRepository\OrganizationLevelInterface;

class OrganizationLevelRepository implements OrganizationLevelInterface
{
    public function all()
    {
        return OrganizationLevel::all();
    }

    public function find(int $id): ?OrganizationLevel
    {
        return OrganizationLevel::find($id);
    }

    public function create(array $data): OrganizationLevel
    {
        return OrganizationLevel::create($data);
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
