<?php

declare(strict_types=1);

namespace App\Person\Application\Model;

use App\Common\Contract\HasArrayKey;
use App\Common\Contract\Id;
use App\Common\ValueObject\Uuid;

readonly final class PersonDelete implements PersonDeleteContract
{
    use Id;
    use HasArrayKey;

    public function __construct(
        private Uuid $id,
    ) {
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id->getUuid(),
        ];
    }
    /**
     * @param array{
     *     'id': string,
     * } $data
     * @return static
     */
    public static function fromArray(array $data): static
    {
        static::validate($data);
        return new static(
            id: Uuid::fromString($data['id']),
        );
    }
}
