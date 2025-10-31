<?php

namespace App\Modules\Reference\Repositories\GraduationPredicateRepository;

use App\Models\GraduationPredicate;
use App\Modules\Reference\Repositories\GraduationPredicateRepository\GraduationPredicateInterface;

class GraduationPredicateRepository implements GraduationPredicateInterface
{
    public function all()
    {
        return GraduationPredicate::all();
    }

    public function find(int $id): ?GraduationPredicate
    {
        return GraduationPredicate::find($id);
    }

    public function create(array $data): GraduationPredicate
    {
        return GraduationPredicate::create($data);
    }

    public function update(int $id, array $data): bool
    {
        $item = $this->find($id);
        return $item ? $item->update($data) : false;
    }

    public function delete(int $id): bool
    {
        $item = $this->find($id);
        return $item ? $item->delete() : false;
    }
}
