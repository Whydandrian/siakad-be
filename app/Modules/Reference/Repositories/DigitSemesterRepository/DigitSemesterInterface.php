<?php

namespace App\Modules\Reference\Repositories\DigitSemesterRepository;
use App\Models\DigitSemester;

interface DigitSemesterInterface
{
    public function all();

    public function find(int $id): ?DigitSemester;

    public function create(array $data): DigitSemester;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;
}
