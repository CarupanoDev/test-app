<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Src\Grade\Infrastructure\GradePostController as GradeCreateController;

final class GradePostController
{
    private $gradeCreateController;

    public function __construct(GradeCreateController $gradeCreateController)
    {
        $this->gradeCreateController = $gradeCreateController;
    }

    public function __invoke(Request $request)
    {
        ($this->gradeCreateController)($request);
    }
}
