<?php

namespace App\Modules\Reference\Repositories\EducationLevelRepository;
use App\Models\EducationLevel;

interface EducationLevelInterface
{
    public function all();

    public function find(int $id): ?EducationLevel;

    public function create(array $data): EducationLevel;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;
}
