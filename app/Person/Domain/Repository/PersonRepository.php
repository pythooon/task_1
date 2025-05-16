<?php

declare(strict_types=1);

namespace App\Person\Domain\Repository;

use App\Person\Application\Model\PersonCreateContract;
use App\Person\Application\Model\PersonDeleteContract;
use App\Person\Application\Model\PersonDetailsContract;
use App\Person\Application\Model\PersonEditContract;
use App\Person\Application\Model\PersonListContract;
use App\Person\Application\Model\PersonReadContract;

interface PersonRepository
{
    public function create(PersonCreateContract $create): PersonReadContract;

    public function edit(PersonEditContract $edit): PersonReadContract;

    public function details(PersonDetailsContract $details): PersonReadContract;

    public function delete(PersonDeleteContract $delete): void;

    public function list(PersonListContract $list): void;
}
