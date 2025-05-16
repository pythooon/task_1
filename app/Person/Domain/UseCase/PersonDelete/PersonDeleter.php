<?php

declare(strict_types=1);

namespace App\Person\Domain\UseCase\PersonDelete;

use App\Person\Application\Model\PersonDeleteContract;
use App\Person\Domain\Mapper\PersonDeleteMapper;
use App\Person\Domain\Repository\PersonRepository;

readonly class PersonDeleter
{
    public function __construct(
        private PersonRepository $repository,
        private PersonDeleteMapper $mapper
    ) {
    }

    public function delete(PersonDeleteContract $contract): void
    {
        $this->repository->delete($this->mapper->mapContractToDeleteModel($contract));
    }
}
