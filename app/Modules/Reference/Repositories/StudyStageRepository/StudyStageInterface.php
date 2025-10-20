<?php

namespace App\Modules\Reference\Repositories\StudyStageRepository;
use App\Models\StudyStage;

interface StudyStageInterface
{
    public function all();

    public function find(int $id): ?StudyStage;

    public function create(array $data): StudyStage;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;
}
