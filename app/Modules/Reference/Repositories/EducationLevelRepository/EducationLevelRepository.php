<?php

namespace App\Modules\Reference\Repositories\EducationLevelRepository;

use App\Models\EducationLevel;
use App\Modules\Reference\Repositories\EducationLevelRepository\EducationLevelInterface;

class EducationLevelRepository implements EducationLevelInterface
{
    public function all()
    {
        return EducationLevel::all();
    }

    public function find(int $id): ?EducationLevel
    {
        return EducationLevel::find($id);
    }

    public function create(array $data): EducationLevel
    {
        return EducationLevel::create($data);
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
