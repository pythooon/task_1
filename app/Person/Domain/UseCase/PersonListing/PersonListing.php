<?php

declare(strict_types=1);

namespace App\Person\Domain\UseCase\PersonListing;

use App\Person\Application\Model\PersonListContract;
use App\Person\Domain\Mapper\PersonListMapper;
use App\Person\Domain\Repository\PersonRepository;

readonly class PersonListing
{
    public function __construct(
        private PersonRepository $repository,
        private PersonListMapper $mapper
    ) {
    }

    public function list(PersonListContract $contract): PersonListContract
    {
        $list = $this->mapper->mapContractToListModel($contract);
        $this->repository->list($list);

        return $list;
    }
}
