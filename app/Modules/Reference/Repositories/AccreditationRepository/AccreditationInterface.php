<?php

namespace App\Modules\Reference\Repositories\AccreditationRepository;
use App\Models\Accreditation;

interface AccreditationInterface
{
    public function all();

    public function find(int $id): ?Accreditation;

    public function create(array $data): Accreditation;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;
}
