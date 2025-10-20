<?php

namespace App\Modules\Reference\Services\CourseTypeService;

use App\Modules\Reference\Repositories\CourseTypeRepository\CourseTypeInterface;

class CourseTypeService
{
    private CourseTypeInterface $repository;

    public function __construct(CourseTypeInterface $repository)
    {
        $this->repository = $repository;
    }

    public function listAll()
    {
        return $this->repository->all();
    }

    public function find(int $id)
    {
        return $this->repository->find($id);
    }

    public function store(array $data)
    {
        return $this->repository->create($data);
    }

    public function update(int $id, array $data)
    {
        $this->repository->update($id, $data);
        return $this->repository->find($id);
    }

    public function delete(int $id)
    {
        return $this->repository->delete($id);
    }
}
