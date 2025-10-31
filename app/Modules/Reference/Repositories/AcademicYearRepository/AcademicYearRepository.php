<?php

namespace App\Modules\Reference\Repositories\AcademicYearRepository;

use App\Models\AcademicYear;
use App\Modules\Reference\Repositories\AcademicYearRepository\AcademicYearInterface;

class AcademicYearRepository implements AcademicYearInterface
{
    public function all()
    {
        return AcademicYear::all();
    }

    public function find(int $id): ?AcademicYear
    {
        return AcademicYear::find($id);
    }

    public function create(array $data): AcademicYear
    {
        return AcademicYear::create($data);
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
