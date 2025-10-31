<?php

namespace App\Modules\Reference\Repositories\GradeListRepository;

use App\Models\GradeList;
use App\Modules\Reference\Repositories\GradeListRepository\GradeListInterface;

class GradeListRepository implements GradeListInterface
{
    public function all()
    {
        return GradeList::all();
    }

    public function find(int $id): ?GradeList
    {
        return GradeList::find($id);
    }

    public function create(array $data): GradeList
    {
        return GradeList::create($data);
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
