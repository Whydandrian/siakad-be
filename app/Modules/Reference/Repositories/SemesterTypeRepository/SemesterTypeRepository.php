<?php

namespace App\Modules\Reference\Repositories\SemesterTypeRepository;

use App\Models\SemesterType;
use App\Modules\Reference\Repositories\SemesterTypeRepository\SemesterTypeInterface;

class SemesterTypeRepository implements SemesterTypeInterface
{
    public function all()
    {
        return SemesterType::all();
    }

    public function find(int $id): ?SemesterType
    {
        return SemesterType::find($id);
    }

    public function create(array $data): SemesterType
    {
        return SemesterType::create($data);
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
