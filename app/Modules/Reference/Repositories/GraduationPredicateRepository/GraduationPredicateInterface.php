<?php

namespace App\Modules\Reference\Repositories\GraduationPredicateRepository;
use App\Models\GraduationPredicate;

interface GraduationPredicateInterface
{
    public function all();

    public function find(int $id): ?GraduationPredicate;

    public function create(array $data): GraduationPredicate;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;
}
