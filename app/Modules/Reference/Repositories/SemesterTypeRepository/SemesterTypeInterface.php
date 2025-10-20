<?php

namespace App\Modules\Reference\Repositories\SemesterTypeRepository;
use App\Models\SemesterType;

interface SemesterTypeInterface
{
    public function all();

    public function find(int $id): ?SemesterType;

    public function create(array $data): SemesterType;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;
}
