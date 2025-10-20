<?php

namespace App\Modules\Reference\Repositories\UnitTypeRepository;
use App\Models\UnitType;

interface UnitTypeInterface
{
    public function all();

    public function find(int $id): ?UnitType;

    public function create(array $data): UnitType;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;
}
