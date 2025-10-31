<?php

namespace App\Modules\Reference\Repositories\DigitSemesterRepository;

use App\Models\DigitSemester;
use App\Modules\Reference\Repositories\DigitSemesterRepository\DigitSemesterInterface;

class DigitSemesterRepository implements DigitSemesterInterface
{
    public function all()
    {
        return DigitSemester::all();
    }

    public function find(int $id): ?DigitSemester
    {
        return DigitSemester::find($id);
    }

    public function create(array $data): DigitSemester
    {
        return DigitSemester::create($data);
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
