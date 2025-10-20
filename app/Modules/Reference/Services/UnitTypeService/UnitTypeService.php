<?php

namespace App\Modules\Reference\Services\UnitTypeService;

use App\Modules\Reference\Repositories\UnitTypeRepository\UnitTypeInterface;

class UnitTypeService
{
    private UnitTypeInterface $repository;

    public function __construct(UnitTypeInterface $repository)
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
        return $this->repository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->repository->delete($id);
    }
}
