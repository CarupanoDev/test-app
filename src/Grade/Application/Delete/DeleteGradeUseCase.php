<?php

namespace Src\Grade\Application\Delete;
use Src\Grade\Domain\Contracts\GradeRepositoryContract;

final class DeleteGradeUseCase
{
    private $repository;

    public function __construct(GradeRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke($id)
    {
        $this->repository->delete($id);
    }
}
