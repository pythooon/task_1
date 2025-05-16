<?php

declare(strict_types=1);

namespace App\Person\Domain;

use App\Person\Application\PersonFacade;
use App\Person\Domain\UseCase\PersonCreate\PersonCreator;
use App\Person\Domain\UseCase\PersonDelete\PersonDeleter;
use App\Person\Domain\UseCase\PersonDetails\PersonDetailer;
use App\Person\Domain\UseCase\PersonEdit\PersonEditor;
use App\Person\Domain\UseCase\PersonListing\PersonListing;
use App\Person\Application\Model\PersonCreateContract;
use App\Person\Application\Model\PersonDeleteContract;
use App\Person\Application\Model\PersonDetailsContract;
use App\Person\Application\Model\PersonEditContract;
use App\Person\Application\Model\PersonListContract;
use App\Person\Application\Model\PersonReadContract;

readonly class PersonFacadeImpl implements PersonFacade
{
    public function __construct(
        private PersonCreator $personCreator,
        private PersonEditor $personEditor,
        private PersonDetailer $personDetailer,
        private PersonListing $personListing,
        private PersonDeleter $personDeleter
    ) {
    }

    public function list(PersonListContract $contract): PersonListContract
    {
        return $this->personListing->list($contract);
    }

    public function details(PersonDetailsContract $contract): PersonReadContract
    {
        return $this->personDetailer->details($contract);
    }

    public function create(PersonCreateContract $contract): PersonReadContract
    {
        return $this->personCreator->create($contract);
    }

    public function edit(PersonEditContract $contract): PersonReadContract
    {
        return $this->personEditor->edit($contract);
    }

    public function delete(PersonDeleteContract $contract): void
    {
        $this->personDeleter->delete($contract);
    }
}
