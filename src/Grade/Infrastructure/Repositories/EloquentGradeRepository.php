<?php

namespace Src\Grade\Infrastructure\Repositories;

use App\Models\Grade as GradeModel;
use Src\Grade\Domain\Contracts\GradeRepositoryContract;
use Src\Grade\Domain\Grade;
use Src\Grade\Domain\ValueObjects\GradeDescription;
use Src\Grade\Domain\ValueObjects\GradeName;

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

    public function search($id): ?Grade
    {
        $grade =  $this->gradeModel->find($id);

        return new Grade(
            new GradeName($grade->name),
            new GradeDescription($grade->description)
        );
    }

    public function delete(int $id): void
    {
        $this->gradeModel::destroy($id);
    }
}
