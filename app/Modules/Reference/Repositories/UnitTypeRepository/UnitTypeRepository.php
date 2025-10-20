<?php

namespace App\Modules\Reference\Repositories\UnitTypeRepository;

use App\Models\UnitType;
use App\Modules\Reference\Repositories\UnitTypeRepository\UnitTypeInterface;

class UnitTypeRepository implements UnitTypeInterface
{
    public function all()
    {
        return UnitType::all();
    }

    public function find(int $id): ?UnitType
    {
        return UnitType::find($id);
    }

    public function create(array $data): UnitType
    {
        return UnitType::create($data);
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
