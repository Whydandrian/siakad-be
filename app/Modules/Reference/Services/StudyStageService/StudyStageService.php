<?php

namespace App\Modules\Reference\Services\StudyStageService;

use App\Modules\Reference\Repositories\StudyStageRepository\StudyStageInterface;

class StudyStageService
{
    private StudyStageInterface $repository;

    public function __construct(StudyStageInterface $repository)
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
