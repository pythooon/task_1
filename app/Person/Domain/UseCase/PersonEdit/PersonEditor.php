<?php

declare(strict_types=1);

namespace App\Person\Domain\UseCase\PersonEdit;

use App\Person\Application\Model\PersonEditContract;
use App\Person\Application\Model\PersonReadContract;
use App\Person\Domain\Mapper\PersonEditMapper;
use App\Person\Domain\Repository\PersonRepository;

readonly class PersonEditor
{
    public function __construct(
        private PersonRepository $repository,
        private PersonEditMapper $mapper
    ) {
    }

    public function edit(PersonEditContract $contract): PersonReadContract
    {
        return $this->repository->edit($this->mapper->mapToEditModel($contract));
    }
}
