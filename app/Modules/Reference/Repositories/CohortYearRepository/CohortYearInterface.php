<?php

namespace App\Modules\Reference\Repositories\CohortYearRepository;
use App\Models\CohortYear;

interface CohortYearInterface
{
    public function all();

    public function find(int $id): ?CohortYear;

    public function create(array $data): CohortYear;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;
}
