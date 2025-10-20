<?php

namespace App\Modules\Reference\Repositories\MinimumPrerequisiteCourseRepository;

use App\Models\MinimumPrerequisiteCourse;
use App\Modules\Reference\Repositories\MinimumPrerequisiteCourseRepository\MinimumPrerequisiteCourseInterface;

class MinimumPrerequisiteCourseRepository implements MinimumPrerequisiteCourseInterface
{
    public function all()
    {
        return MinimumPrerequisiteCourse::all();
    }

    public function find(int $id): ?MinimumPrerequisiteCourse
    {
        return MinimumPrerequisiteCourse::find($id);
    }

    public function create(array $data): MinimumPrerequisiteCourse
    {
        return MinimumPrerequisiteCourse::create($data);
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
