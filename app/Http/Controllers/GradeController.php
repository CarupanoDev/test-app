<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function __invoke(Request $request)
    {
        Grade::findOrFail($request->id)->delete();
    }
}
