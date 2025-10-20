<?php

namespace App\Modules\Reference\Repositories\UserRepository;

use App\Models\User;
use App\Modules\Reference\Repositories\UserRepository\UserInterface;

class UserRepository implements UserInterface
{
    public function all()
    {
        return User::all();
    }

    public function find(int $id): ?User
    {
        return User::find($id);
    }

    public function create(array $data): User
    {
        return User::create($data);
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
