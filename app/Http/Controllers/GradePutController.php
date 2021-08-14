<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Src\Grade\Infrastructure\GradePutController as GradeUpdateController;

final class GradePutController
{
    private $gradeUpdateController;

    public function __construct(GradeUpdateController $gradePutController)
    {
        $this->gradeUpdateController = $gradePutController;
    }

    public function __invoke($id, Request $request)
    {
        ($this->gradeUpdateController)($id, $request);
    }
}
