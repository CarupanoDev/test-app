<?php

namespace Src\Grade\Domain\Contracts;
use Src\Grade\Domain\Grade;

interface GradeRepositoryContract
{
    public function save(Grade $grade): void;
    public function delete(int $id): void;
}
