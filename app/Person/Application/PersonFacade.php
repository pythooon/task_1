<?php

declare(strict_types=1);

namespace App\Person\Application;

use App\Person\Application\Model\PersonCreateContract;
use App\Person\Application\Model\PersonDeleteContract;
use App\Person\Application\Model\PersonDetailsContract;
use App\Person\Application\Model\PersonEditContract;
use App\Person\Application\Model\PersonListContract;
use App\Person\Application\Model\PersonReadContract;

interface PersonFacade
{
    public function create(PersonCreateContract $contract): PersonReadContract;

    public function edit(PersonEditContract $contract): PersonReadContract;

    public function details(PersonDetailsContract $contract): PersonReadContract;

    public function list(PersonListContract $contract): PersonListContract;

    public function delete(PersonDeleteContract $contract): void;
}
