<?php

declare(strict_types=1);

namespace App\Person\Infrastructure\Repository;

use App\Person\Application\Exception\PersonNotFoundException;
use App\Person\Infrastructure\Entity\Person;
use Illuminate\Support\Facades\DB;

readonly class PersonEntityRepositoryImpl implements PersonEntityRepository
{
    public function __construct(private Person $entity, private DB $db)
    {
    }

    public function create(Person $entity): void
    {
        $entity->save();
    }

    public function edit(Person $entity): void
    {
        $this->db::table($entity->getTable())->where('id', '=', $entity->getId())->update(
            $entity->toArray()
        );
    }

    public function details(Person $entity): Person
    {
        $entityLoaded = $this->entity->find($entity->getId());

        if ($entityLoaded === null) {
            throw new PersonNotFoundException();
        }

        return $entityLoaded;
    }

    public function delete(Person $entity): void
    {
        $this->db::table($entity->getTable())->where('id', '=', $entity->getId())->delete();
    }

    /**
     * @return array<int, mixed>
     */
    public function list(): array
    {
        return $this->entity->all()->toArray();
    }
}
