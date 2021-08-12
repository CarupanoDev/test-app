<?php

namespace Src\Grade\Application\Create;

final class CreateGradeRequest
{
    private string $name;
    private  string $description;

    public function __construct($name, $description)
    {
        $this->name = $name;
        $this->description = $description;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function description(): string
    {
        return $this->description;
    }

}
