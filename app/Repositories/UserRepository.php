<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class UserRepository
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * Get all records
     */
    public function all(): Collection
    {
        return $this->model->all();
    }

    /**
     * Get paginated records with filters
     */
    public function paginate(array $filters = [], int $perPage = 10): LengthAwarePaginator
    {
        $query = $this->model->newQuery();

        // Apply filters
        foreach ($filters as $key => $value) {
            if (!empty($value)) {
                $query->where($key, "like", "%{$value}%");
            }
        }

        return $query->paginate($perPage);
    }

    /**
     * Find record by ID
     */
    public function find(int $id): ?User
    {
        return $this->model->find($id);
    }

    /**
     * Create new record
     */
    public function create(array $data): User
    {
        return $this->model->create($data);
    }

    /**
     * Update existing record
     */
    public function update(User $user, array $data): User
    {
        $user->update($data);
        return $user;
    }

    /**
     * Delete record
     */
    public function delete(User $user): bool
    {
        return $user->delete();
    }
}
