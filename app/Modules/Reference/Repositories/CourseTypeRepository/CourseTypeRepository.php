<?php

namespace App\Modules\Reference\Repositories\CourseTypeRepository;

use App\Models\CourseType;
use App\Modules\Reference\Repositories\CourseTypeRepository\CourseTypeInterface;

class CourseTypeRepository implements CourseTypeInterface
{
    public function all()
    {
        return CourseType::all();
    }

    public function find(int $id): ?CourseType
    {
        return CourseType::find($id);
    }

    public function create(array $data): CourseType
    {
        return CourseType::create($data);
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
