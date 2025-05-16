<?php

declare(strict_types=1);

namespace App\Person\Domain\Mapper;

use App\Person\Application\Model\PersonEdit;
use App\Person\Application\Model\PersonEditContract;

class PersonEditMapper
{
    public function mapToEditModel(PersonEditContract $contract): PersonEditContract
    {
        return new PersonEdit(
            $contract->getId(),
            $contract->getFirstName(),
            $contract->getLastName(),
            $contract->isCompany(),
            $contract->getCompanyName(),
            $contract->getVatNumber()
        );
    }
}
