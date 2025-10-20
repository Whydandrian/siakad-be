<?php

namespace App\Modules\Dashboard\Services\UserService;

use App\Modules\Dashboard\Repositories\UserRepository\UserRepository;

class UserService
{
    public function __construct(
        private UserRepository $repository
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
