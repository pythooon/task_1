<?php

declare(strict_types=1);

namespace App\Person\Application\Model;

use App\Common\Contract\HasArrayKey;
use App\Common\Contract\UserId;

final class PersonList implements PersonListContract
{
    use UserId;
    use HasArrayKey;

    /**
     * @param array<int, PersonReadContract> $items
     */
    public function __construct(
        private array $items = []
    ) {
    }

    public function addItem(PersonReadContract $item): void
    {
        $this->items[] = $item;
    }

    public function toArray(): array
    {
        return [
            'items' => array_map(fn(PersonReadContract $contract): array => $contract->toArray(), $this->items)
        ];
    }

    /**
     * @param array{
     *     'items': array<int, array{
     *      'id': string,
     *      'firstName': string,
     *      'lastName': string,
     *      'company': string,
     *      'companyName': string,
     *      'vatNumber': string,
     *     }>
     * } $data
     * @return static
     */
    public static function fromArray(array $data): static
    {
        static::validate($data);
        $items = [];
        foreach ($data['items'] as $item) {
            $items[] = PersonRead::fromArray($item);
        }
        return new static(
            items: $items
        );
    }
}
