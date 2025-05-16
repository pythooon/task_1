<?php

declare(strict_types=1);

namespace App\Person\Infrastructure\Mapper;

use App\Common\ValueObject\Uuid;
use App\Person\Application\Model\PersonCreateContract;
use App\Person\Application\Model\PersonDeleteContract;
use App\Person\Application\Model\PersonDetailsContract;
use App\Person\Application\Model\PersonEditContract;
use App\Person\Application\Model\PersonRead;
use App\Person\Application\Model\PersonReadContract;
use App\Person\Infrastructure\Entity\Person;

class PersonEntityMapper
{
    public function mapCreateModelToEntity(PersonCreateContract $create): Person
    {
        return new Person(
            [
            'id' => $create->getId(),
            'firstName' => $create->getFirstName(),
            'lastName' => $create->getLastName(),
            'company' => $create->isCompany(),
            'companyName' => $create->getCompanyName(),
            'vatNumber' => $create->getVatNumber()
            ]
        );
    }

    public function mapEditModelToEntity(PersonEditContract $edit): Person
    {
        return new Person(
            [
            'id' => $edit->getId(),
            'firstName' => $edit->getFirstName(),
            'lastName' => $edit->getLastName(),
            'company' => $edit->isCompany(),
            'companyName' => $edit->getCompanyName(),
            'vatNumber' => $edit->getVatNumber()
            ]
        );
    }

    public function mapEntityToReadModel(Person $entity): PersonReadContract
    {
        return new PersonRead(
            Uuid::fromString($entity->getId()),
            $entity->getFirstName(),
            $entity->getLastName(),
            $entity->isCompany(),
            $entity->getCompanyName(),
            $entity->getVatNumber()
        );
    }

    public function mapDetailsModelToEntity(PersonDetailsContract $details): Person
    {
        return new Person(['id' => $details->getId()]);
    }

    public function mapDeleteModelToEntity(PersonDeleteContract $delete): Person
    {
        return new Person(['id' => $delete->getId()]);
    }
}
