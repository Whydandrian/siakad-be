<?php

namespace App\Modules\Reference\Repositories\MinimumPrerequisiteCourseRepository;
use App\Models\MinimumPrerequisiteCourse;

interface MinimumPrerequisiteCourseInterface
{
    public function all();

    public function find(int $id): ?MinimumPrerequisiteCourse;

    public function create(array $data): MinimumPrerequisiteCourse;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;
}
