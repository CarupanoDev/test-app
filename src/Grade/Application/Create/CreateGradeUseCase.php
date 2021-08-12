<?php

namespace Src\Grade\Application\Create;

use Src\Grade\Domain\Contracts\GradeRepositoryContract;
use Src\Grade\Domain\Grade;
use Src\Grade\Domain\ValueObjects\GradeName;
use Src\Grade\Domain\ValueObjects\GradeDescription;

final class CreateGradeUseCase
{
    private $repository;

    public function __construct(GradeRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(string $gradeName, string $gradeDescription)
    {
        $name = new GradeName($gradeName);
        $description = new GradeDescription($gradeDescription);

        $grade = Grade::create($name, $description);

        $this->repository->save($grade);
    }
}
