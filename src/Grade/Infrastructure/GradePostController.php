<?php

namespace Src\Grade\Infrastructure;

use Illuminate\Http\Request;
use Src\Grade\Application\Create\CreateGradeUseCase;
use Src\Grade\Application\Create\CreateGradeRequest;
use Src\Grade\Infrastructure\Repositories\EloquentGradeRepository;


final class GradePostController
{
    private $repository;

    public function __construct(EloquentGradeRepository $eloquentGradeRepository)
    {
        $this->repository = $eloquentGradeRepository;
    }

    public function __invoke(Request $request)
    {
        $grade = new CreateGradeRequest(
            $request->get('name'),
            $request->get('description')
        );

        $createGradeUseCase = new CreateGradeUseCase($this->repository);

        ($createGradeUseCase)(
            $grade->name(),
            $grade->description()
        );
    }
}
