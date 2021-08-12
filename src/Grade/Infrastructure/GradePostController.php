<?php

namespace Src\Grade\Infrastructure;

use Illuminate\Http\Request;
use Src\Grade\Application\Create\CreateGradeUseCase;
use Src\Grade\Application\Create\CreateGradeRequest;
use Src\Grade\Infrastructure\Repositories\EloquentGradeRepository;


final class GradePostController
{
    private $repository;
    private $useCase;

    public function __construct(EloquentGradeRepository $repository, CreateGradeUseCase $useCase)
    {
        $this->repository = $repository;
        $this->useCase = $useCase;
    }

    public function __invoke(Request $request)
    {
        $grade = new CreateGradeRequest(
            $request->get('name'),
            $request->get('description')
        );

        ($this->useCase)(
            $grade->name(),
            $grade->description()
        );
    }
}
