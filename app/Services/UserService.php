<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Get all records
     */
    public function all(): Collection
    {
        return $this->userRepository->all();
    }

    /**
     * Get paginated records
     */
    public function paginate(array $filters = [], int $perPage = 10): LengthAwarePaginator
    {
        return $this->userRepository->paginate($filters, $perPage);
    }

    /**
     * Find record by ID
     */
    public function find(int $id): ?User
    {
        return $this->userRepository->find($id);
    }

    /**
     * Create new record
     */
    public function create(array $data): User
    {
        return $this->userRepository->create($data);
    }

    /**
     * Update existing record
     */
    public function update(User $user, array $data): User
    {
        return $this->userRepository->update($user, $data);
    }

    /**
     * Delete record
     */
    public function delete(User $user): bool
    {
        return $this->userRepository->delete($user);
    }
}
