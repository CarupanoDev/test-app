<?php

namespace Src\Grade\Infrastructure;

use Illuminate\Http\Request;
use Src\Grade\Application\Update\UpdateGradeUseCase;
use Src\Grade\Application\Update\UpdateGradeRequest;

class GradePutController
{
    private $useCase;

    public function __construct(UpdateGradeUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function __invoke($id, Request $request)
    {
        $updateGradeRequest = new UpdateGradeRequest(
            $id,
            $request->get('name'),
            $request->get('description')
        );

        ($this->useCase)(
            $updateGradeRequest->id(),
            $updateGradeRequest->name(),
            $updateGradeRequest->description()
        );
    }
}
