<?php

namespace App\Modules\Reference\Repositories\StatusTypeRepository;
use App\Models\StatusType;

interface StatusTypeInterface
{
    public function all();

    public function find(int $id): ?StatusType;

    public function create(array $data): StatusType;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;
}
