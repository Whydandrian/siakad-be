<?php

namespace App\Modules\Reference\Repositories\AdmissionPathwayRepository;
use App\Models\AdmissionPathway;

interface AdmissionPathwayInterface
{
    public function all();

    public function find(int $id): ?AdmissionPathway;

    public function create(array $data): AdmissionPathway;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;
}
