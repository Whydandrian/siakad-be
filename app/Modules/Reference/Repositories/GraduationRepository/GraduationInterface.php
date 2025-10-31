<?php

namespace App\Modules\Reference\Repositories\GraduationRepository;
use App\Models\Graduation;

interface GraduationInterface
{
    public function all();

    public function find(int $id): ?Graduation;

    public function create(array $data): Graduation;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;
}
