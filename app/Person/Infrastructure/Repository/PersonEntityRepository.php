<?php

declare(strict_types=1);

namespace App\Person\Infrastructure\Repository;

use App\Person\Infrastructure\Entity\Person;

interface PersonEntityRepository
{
    public function create(Person $entity): void;

    public function edit(Person $entity): void;

    public function details(Person $entity): Person;

    public function delete(Person $entity): void;

    /**
     * @return array<int, array<int, mixed>>
     */
    public function list(): array;
}
