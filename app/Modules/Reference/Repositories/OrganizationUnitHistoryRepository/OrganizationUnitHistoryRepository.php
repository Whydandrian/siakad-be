<?php

namespace App\Modules\Reference\Repositories\OrganizationUnitHistoryRepository;

use App\Models\OrganizationUnitHistory;
use App\Modules\Reference\Repositories\OrganizationUnitHistoryRepository\OrganizationUnitHistoryInterface;

class OrganizationUnitHistoryRepository implements OrganizationUnitHistoryInterface
{
    public function all()
    {
        return OrganizationUnitHistory::all();
    }

    public function find(int $id): ?OrganizationUnitHistory
    {
        return OrganizationUnitHistory::find($id);
    }

    public function create(array $data): OrganizationUnitHistory
    {
        return OrganizationUnitHistory::create($data);
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
