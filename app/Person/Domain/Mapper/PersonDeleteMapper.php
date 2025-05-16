<?php

declare(strict_types=1);

namespace App\Person\Domain\Mapper;

use App\Person\Application\Model\PersonDelete;
use App\Person\Application\Model\PersonDeleteContract;

class PersonDeleteMapper
{
    public function mapContractToDeleteModel(PersonDeleteContract $contract): PersonDeleteContract
    {
        return new PersonDelete($contract->getId());
    }
}
