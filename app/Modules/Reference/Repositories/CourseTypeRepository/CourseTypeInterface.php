<?php

namespace App\Modules\Reference\Repositories\CourseTypeRepository;
use App\Models\CourseType;

interface CourseTypeInterface
{
    public function all();

    public function find(int $id): ?CourseType;

    public function create(array $data): CourseType;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;
}
