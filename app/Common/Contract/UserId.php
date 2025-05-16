<?php

declare(strict_types=1);

namespace App\Common\Contract;

use App\Common\Exception\InvalidArgumentException;
use App\Common\ValueObject\Uuid;

trait UserId
{
    public function getUserId(): Uuid
    {
        return $this->hasUserId()
            ? $this->userId
            : throw new InvalidArgumentException(static::class . ' userId is not set');
    }

    public function hasUserId(): bool
    {
        return $this->userId !== null;
    }
}
