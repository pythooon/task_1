<?php

declare(strict_types=1);

namespace App\Person\Domain\UseCase\PersonDetails;

use App\Person\Application\Model\PersonDetailsContract;
use App\Person\Application\Model\PersonReadContract;
use App\Person\Domain\Mapper\PersonDetailsMapper;
use App\Person\Domain\Repository\PersonRepository;

readonly class PersonDetailer
{
    public function __construct(
        private PersonRepository $repository,
        private PersonDetailsMapper $mapper
    ) {
    }

    public function details(PersonDetailsContract $contract): PersonReadContract
    {
        return $this->repository->details(
            $this->mapper->mapContractToReadModel($contract)
        );
    }
}
