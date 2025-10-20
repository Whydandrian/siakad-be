<?php

namespace App\Modules\Reference\Repositories\StatusRepository;
use App\Models\Status;

interface StatusInterface
{
    public function all();

    public function find(int $id): ?Status;

    public function create(array $data): Status;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;
}
