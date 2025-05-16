<?php

declare(strict_types=1);

namespace App\Person\Application\Model;

use App\Common\ValueObject\Uuid;
use Illuminate\Foundation\Http\FormRequest;

final class PersonCreateRequest extends FormRequest implements PersonCreateContract
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string,array<string>>
     */
    public function rules(): array
    {
        return [
            'firstName' => ['required'],
            'lastName' => ['required'],
            'company' => ['required', 'boolean'],
            'companyName' => ['required'],
            'vatNumber' => ['required']
        ];
    }

    public function getId(): Uuid
    {
        return new Uuid();
    }

    public function hasId(): bool
    {
        return true;
    }


    public function getFirstName(): string
    {
        /** @var string $firstName */
        $firstName = $this->post('firstName');

        return $firstName;
    }

    public function getLastName(): string
    {
        /** @var string $lastName */
        $lastName = $this->post('lastName');

        return $lastName;
    }

    public function isCompany(): bool
    {
        return $this->boolean('company');
    }

    public function getCompanyName(): ?string
    {
        /** @var string|null $companyName */
        $companyName = $this->post('companyName');

        return $companyName;
    }

    public function getVatNumber(): ?string
    {
        /** @var string|null $vatName */
        $vatName = $this->post('vatName');

        return $vatName;
    }

    public static function fromArray(array $data): static
    {
        throw new \LogicException('Not implemented');
    }
}
