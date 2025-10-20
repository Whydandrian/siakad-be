<?php

namespace App\Modules\Reference\Repositories\OrganizationUnitRepository;
use App\Models\OrganizationUnit;

interface OrganizationUnitInterface
{
    public function all();

    public function find(int $id): ?OrganizationUnit;

    public function create(array $data): OrganizationUnit;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;
}
