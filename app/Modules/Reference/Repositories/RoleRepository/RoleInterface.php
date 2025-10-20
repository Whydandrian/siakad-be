<?php

namespace App\Modules\Reference\Repositories\RoleRepository;
use App\Models\Role;

interface RoleInterface
{
    public function all();

    public function find(int $id): ?Role;

    public function create(array $data): Role;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;
}
