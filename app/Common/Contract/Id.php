<?php

declare(strict_types=1);

namespace App\Common\Contract;

use App\Common\Exception\InvalidArgumentException;
use App\Common\ValueObject\Uuid;

trait Id
{
    public function getId(): Uuid
    {
        return $this->hasId() ? $this->id : throw new InvalidArgumentException(static::class . ' id is not set');
    }

    public function hasId(): bool
    {
        return $this->id instanceof Uuid;
    }
}
