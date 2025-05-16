<?php

declare(strict_types=1);

namespace App\Person\Application\Model;

use App\Common\Contract\Arrayable;
use App\Common\Contract\HasId;

interface PersonCreateContract extends Arrayable, HasId
{
    public function getFirstName(): string;

    public function getLastName(): string;

    public function isCompany(): bool;

    public function getCompanyName(): ?string;

    public function getVatNumber(): ?string;
}
