<?php

namespace App\Http\Controllers;

use App\Models\Grade;

final class GradeGetController
{
    public function __invoke()
    {
        return Grade::get();
    }
}
