<?php

namespace App\Modules\Reference\Repositories\OrganizationUnitHistoryRepository;
use App\Models\OrganizationUnitHistory;

interface OrganizationUnitHistoryInterface
{
    public function all();

    public function find(int $id): ?OrganizationUnitHistory;

    public function create(array $data): OrganizationUnitHistory;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;
}
