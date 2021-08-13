<?php

namespace Src\Grade\Application\Delete;
use Src\Grade\Domain\Contracts\GradeRepositoryContract;
use Src\Grade\Application\Find\GradeFinder;

final class DeleteGradeUseCase
{
    private $finder;
    private $repository;

    public function __construct(GradeRepositoryContract $repository)
    {
        $this->repository = $repository;
        $this->finder = new GradeFinder($repository);
    }

    public function __invoke($id)
    {
        $grade = ($this->finder)($id);

        $this->repository->delete($grade);
    }
}
