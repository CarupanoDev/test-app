<?php

namespace Src\Grade\Domain\Contracts;
use Src\Grade\Domain\Grade;
use Src\Grade\Domain\ValueObjects\GradeId;

interface GradeRepositoryContract
{
    public function save(Grade $grade): void;
    public function search($id): ?Grade;
    public function update(GradeId $id, Grade $grade): void;
    public function delete(int $id): void;
}
