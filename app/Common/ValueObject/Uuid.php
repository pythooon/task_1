<?php

declare(strict_types=1);

namespace App\Common\ValueObject;

use App\Common\Exception\InvalidArgumentException;
use Stringable;

class Uuid implements Stringable
{
    private string $uuid;

    public function __construct(?string $uuid = null)
    {
        if ($uuid !== null) {
            $this->uuid = $uuid;
        } else {
            $this->uuid = \Ramsey\Uuid\Uuid::uuid4()->toString();
        }
        $this->validate();
    }

    public static function fromString(string $uuid): self
    {
        return new self($uuid);
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function equals(Uuid $uuid): bool
    {
        return $this->uuid === $uuid->getUuid();
    }

    public function __toString(): string
    {
        return $this->uuid;
    }

    public static function isValid(string $value): bool
    {
        return \Ramsey\Uuid\Uuid::isValid($value);
    }

    public static function generate(): self
    {
        return new self();
    }

    private function validate(): void
    {
        if (!self::isValid(($this->uuid))) {
            throw new InvalidArgumentException('Invalid UUID string: invalid-uuid', ['uuid' => $this->uuid]);
        }
    }
}
