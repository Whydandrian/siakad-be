<?php

namespace App\Modules\Reference\Repositories\CohortYearRepository;

use App\Models\CohortYear;
use App\Modules\Reference\Repositories\CohortYearRepository\CohortYearInterface;

class CohortYearRepository implements CohortYearInterface
{
    public function all()
    {
        return CohortYear::all();
    }

    public function find(int $id): ?CohortYear
    {
        return CohortYear::find($id);
    }

    public function create(array $data): CohortYear
    {
        return CohortYear::create($data);
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
