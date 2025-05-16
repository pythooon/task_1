<?php

declare(strict_types=1);

namespace App\Common\Contract;

use App\Common\ValueObject\Uuid;

interface HasId
{
    public function getId(): Uuid;

    /**
     * @phpstan-assert-if-true Uuid $this->id
     */
    public function hasId(): bool;
}
