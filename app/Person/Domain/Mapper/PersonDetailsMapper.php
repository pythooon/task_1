<?php

declare(strict_types=1);

namespace App\Person\Domain\Mapper;

use App\Person\Application\Model\PersonDetails;
use App\Person\Application\Model\PersonDetailsContract;

class PersonDetailsMapper
{
    public function mapContractToReadModel(PersonDetailsContract $contract): PersonDetailsContract
    {
        return new PersonDetails($contract->getId());
    }
}
