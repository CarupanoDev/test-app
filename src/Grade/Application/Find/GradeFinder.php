<?php

namespace Src\Grade\Application\Find;

use Src\Grade\Domain\Grade;
use Src\Grade\Domain\Contracts\GradeRepositoryContract;

final class GradeFinder
{
    private $repository;

    public function __construct(GradeRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke($id): Grade
    {
       $grade =  $this->repository->search($id);

       return $grade;
    }
}
