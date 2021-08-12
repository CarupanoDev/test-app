<?php

namespace Src\Grade\Domain;

use Src\Grade\Domain\ValueObjects\GradeDescription;
use Src\Grade\Domain\ValueObjects\GradeName;

class Grade
{
    private $name;
    private  $description;

    public function __construct(GradeName $name, GradeDescription $description)
    {
        $this->name = $name;
        $this->description = $description;
    }

    public function name(): GradeName
    {
        return $this->name;
    }

    public function description(): GradeDescription
    {
        return $this->description;
    }

    public static function create(GradeName $name, GradeDescription  $description): Grade
    {
        return new self($name, $description);
    }
}
