<?php

namespace Src\Grade\Infrastructure;

use Illuminate\Http\Client\Request;
use Src\Grade\Application\Delete\DeleteGradeUseCase;
use Src\Grade\Infrastructure\Repositories\EloquentGradeRepository;

final class GradeDeleteController
{
    private $repository;

    public function __construct(EloquentGradeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke($id)
    {
        $deleteGradeUseCase = new DeleteGradeUseCase($this->repository);

        ($deleteGradeUseCase)($id);
    }
}
