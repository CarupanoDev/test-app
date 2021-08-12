<?php

namespace Src\Grade\Infrastructure\Repositories;

use App\Models\Grade as GradeModel;
use Src\Grade\Domain\Contracts\GradeRepositoryContract;
use Src\Grade\Domain\Grade;

class EloquentGradeRepository implements GradeRepositoryContract
{
    private $gradeModel;

    public function __construct(GradeModel $gradeModel)
    {
        $this->gradeModel = $gradeModel;
    }

    public function save(Grade $grade): void
    {
        $data = [
            'name' => $grade->name()->value(),
            'description' => $grade->description()->value()
        ];

        $this->gradeModel->create($data);
    }

    public function delete(int $id): void
    {
        $this->gradeModel->findOrFail($id)->delete();
    }
}
