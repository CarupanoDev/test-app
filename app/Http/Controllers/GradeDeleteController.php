<?php

namespace App\Http\Controllers;

use Src\Grade\Infrastructure\GradeDeleteController as DeleteController;

final class GradeDeleteController
{
    private $gradeDeleteController;

    public function __construct(DeleteController $gradeDeleteController)
    {
        $this->gradeDeleteController = $gradeDeleteController;
    }

    public function __invoke($id)
    {
        ($this->gradeDeleteController)($id);
    }
}
