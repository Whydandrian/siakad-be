<?php

namespace App\Modules\Reference\Services\UserService;

use App\Modules\Reference\Repositories\UserRepository\UserInterface;

class UserService
{
    private UserInterface $repository;

    public function __construct(UserInterface $repository)
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
        $user = $this->repository->find($id);
        if (!$user) return null;
        $this->repository->update($id, $data);

        return $user->refresh();
    }

    public function delete(int $id)
    {
        return $this->repository->delete($id);
    }
}
