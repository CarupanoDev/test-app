<?php

namespace Src\Grade\Infrastructure;

use Illuminate\Http\Request;
use Src\Grade\Application\Create\CreateGradeUseCase;
use Src\Grade\Application\Create\CreateGradeRequest;


final class GradePostController
{
    private $useCase;

    public function __construct(CreateGradeUseCase $useCase)
    {
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
