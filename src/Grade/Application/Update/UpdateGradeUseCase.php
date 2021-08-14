<?php

namespace Src\Grade\Application\Update;

use Src\Grade\Domain\Grade;
use Src\Grade\Domain\ValueObjects\GradeId;
use Src\Grade\Domain\ValueObjects\GradeName;
use Src\Grade\Domain\ValueObjects\GradeDescription;
use Src\Grade\Domain\Contracts\GradeRepositoryContract;

class UpdateGradeUseCase
{
    private $repository;

    public function __construct(GradeRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke($id, $name, $description)
    {
        $gradeId = new GradeId($id);
        $gradeName = new GradeName($name);
        $gradeDescription = new GradeDescription($description);

        $grade = Grade::create($gradeName, $gradeDescription);

        $this->repository->update($gradeId, $grade);
    }
}
