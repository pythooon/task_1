<?php

declare(strict_types=1);

namespace App\Person\Domain\Mapper;

use App\Person\Application\Model\PersonCreate;
use App\Person\Application\Model\PersonCreateContract;

class PersonCreateMapper
{
    public function mapToCreateModel(PersonCreateContract $contract): PersonCreateContract
    {
        return new PersonCreate(
            $contract->getId(),
            $contract->getFirstName(),
            $contract->getLastName(),
            $contract->isCompany(),
            $contract->getCompanyName(),
            $contract->getVatNumber()
        );
    }
}
