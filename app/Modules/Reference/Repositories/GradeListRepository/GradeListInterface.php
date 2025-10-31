<?php

namespace App\Modules\Reference\Repositories\GradeListRepository;
use App\Models\GradeList;

interface GradeListInterface
{
    public function all();

    public function find(int $id): ?GradeList;

    public function create(array $data): GradeList;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;
}
