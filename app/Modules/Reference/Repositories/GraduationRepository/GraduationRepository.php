<?php

namespace App\Modules\Reference\Repositories\GraduationRepository;

use App\Models\Graduation;
use App\Modules\Reference\Repositories\GraduationRepository\GraduationInterface;

class GraduationRepository implements GraduationInterface
{
    public function all()
    {
        return Graduation::all();
    }

    public function find(int $id): ?Graduation
    {
        return Graduation::find($id);
    }

    public function create(array $data): Graduation
    {
        return Graduation::create($data);
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
