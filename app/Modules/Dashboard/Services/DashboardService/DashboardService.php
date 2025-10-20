<?php

namespace App\Modules\Dashboard\Services\DashboardService;

use App\Modules\Dashboard\Repositories\DashboardRepository\DashboardRepository;

class DashboardService
{
    public function __construct(
        private DashboardRepository $repository
    ) {}

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
