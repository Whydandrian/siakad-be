<?php

namespace App\Modules\Reference\Repositories\StudyStageRepository;

use App\Models\StudyStage;
use App\Modules\Reference\Repositories\StudyStageRepository\StudyStageInterface;

class StudyStageRepository implements StudyStageInterface
{
    public function all()
    {
        return StudyStage::all();
    }

    public function find(int $id): ?StudyStage
    {
        return StudyStage::find($id);
    }

    public function create(array $data): StudyStage
    {
        return StudyStage::create($data);
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
