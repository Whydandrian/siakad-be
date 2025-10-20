<?php

namespace App\Modules\Reference\Repositories\StatusTypeRepository;

use App\Models\StatusType;
use App\Modules\Reference\Repositories\StatusTypeRepository\StatusTypeInterface;

class StatusTypeRepository implements StatusTypeInterface
{
    public function all()
    {
        return StatusType::all();
    }

    public function find(int $id): ?StatusType
    {
        return StatusType::find($id);
    }

    public function create(array $data): StatusType
    {
        return StatusType::create($data);
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
