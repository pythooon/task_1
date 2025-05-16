<?php

declare(strict_types=1);

namespace App\Person\Domain\UseCase\PersonCreate;

use App\Person\Application\Model\PersonCreateContract;
use App\Person\Application\Model\PersonReadContract;
use App\Person\Domain\Mapper\PersonCreateMapper;
use App\Person\Domain\Repository\PersonRepository;

readonly class PersonCreator
{
    public function __construct(
        private PersonRepository $repository,
        private PersonCreateMapper $mapper
    ) {
    }

    public function create(PersonCreateContract $contract): PersonReadContract
    {
        return $this->repository->create($this->mapper->mapToCreateModel($contract));
    }
}
