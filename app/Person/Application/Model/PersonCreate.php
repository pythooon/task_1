<?php

declare(strict_types=1);

namespace App\Person\Application\Model;

use App\Common\Contract\HasArrayKey;
use App\Common\Contract\Id;
use App\Common\ValueObject\Uuid;

readonly final class PersonCreate implements PersonCreateContract
{
    use Id;
    use HasArrayKey;

    public function __construct(
        private Uuid $id,
        private string $firstName,
        private string $lastName,
        private bool $company = false,
        private ?string $companyName = null,
        private ?string $vatNumber = null
    ) {
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function isCompany(): bool
    {
        return $this->company;
    }

    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    public function getVatNumber(): ?string
    {
        return $this->vatNumber;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id->getUuid(),
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'company' => $this->company,
            'companyName' => $this->companyName,
            'vatNumber' => $this->vatNumber
        ];
    }

    /**
     * @param array{
     *     'id': string,
     *     'firstName': string,
     *     'lastName': string,
     *     'company': string,
     *     'companyName': string,
     *     'vatNumber': string,
     * } $data
     * @return static
     */
    public static function fromArray(array $data): static
    {
        static::validate($data);
        return new static(
            id: Uuid::fromString($data['id']),
            firstName: $data['firstName'],
            lastName: $data['lastName'],
            company: (bool)$data['company'],
            companyName: $data['companyName'],
            vatNumber: $data['vatNumber']
        );
    }
}
