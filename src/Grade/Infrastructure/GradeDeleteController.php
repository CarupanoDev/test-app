<?php

namespace Src\Grade\Infrastructure;

use Src\Grade\Application\Delete\DeleteGradeUseCase;

final class GradeDeleteController
{
    private $useCase;

    public function __construct(DeleteGradeUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function __invoke($id)
    {
        ($this->useCase)($id);
    }
}
