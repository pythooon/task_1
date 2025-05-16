<?php

declare(strict_types=1);

namespace App\Person\Domain\Mapper;

use App\Person\Application\Model\PersonList;
use App\Person\Application\Model\PersonListContract;

class PersonListMapper
{
    public function mapContractToListModel(
        PersonListContract $contract
    ): PersonListContract {
        return new PersonList();
    }
}
