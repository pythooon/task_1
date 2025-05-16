<?php

declare(strict_types=1);

namespace App\Common\Contract;

use App\Common\ValueObject\Uuid;

interface HasUserId
{
    public function getUserId(): Uuid;
    /**
     * @phpstan-assert-if-true Uuid $this->userId
     */
    public function hasUserId(): bool;
}
