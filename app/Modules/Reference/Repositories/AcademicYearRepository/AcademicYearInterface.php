<?php

namespace App\Modules\Reference\Repositories\AcademicYearRepository;
use App\Models\AcademicYear;

interface AcademicYearInterface
{
    public function all();

    public function find(int $id): ?AcademicYear;

    public function create(array $data): AcademicYear;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;
}
