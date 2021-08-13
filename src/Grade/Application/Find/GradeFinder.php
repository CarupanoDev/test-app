<?php

namespace Src\Grade\Application\Find;

use Src\Grade\Domain\Grade;
use Src\Grade\Domain\Contracts\GradeRepositoryContract;
use InvalidArgumentException;

final class GradeFinder
{
    private $repository;

    public function __construct(GradeRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke($id): int
    {
        $grade = $this->repository->search($id);

        if(null == $grade)
        {
            throw new InvalidArgumentException("Grade {$id} does not exists.");
        }

        return (int)$id;
    }
}
