<?php

namespace App\Modules\Reference\Repositories\StatusRepository;

use App\Models\Status;
use App\Modules\Reference\Repositories\StatusRepository\StatusInterface;

class StatusRepository implements StatusInterface
{
    public function all()
    {
        return Status::with('status_type')->get();
    }

    public function find(int $id): ?Status
    {
        return Status::with('status_type')->find($id);
    }

    public function create(array $data): Status
    {
        return Status::create($data)->load('status_type');
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
