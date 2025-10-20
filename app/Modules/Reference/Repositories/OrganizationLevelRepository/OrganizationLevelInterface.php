<?php

namespace App\Modules\Reference\Repositories\OrganizationLevelRepository;
use App\Models\OrganizationLevel;

interface OrganizationLevelInterface
{
    public function all();

    public function find(int $id): ?OrganizationLevel;

    public function create(array $data): OrganizationLevel;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;
}
