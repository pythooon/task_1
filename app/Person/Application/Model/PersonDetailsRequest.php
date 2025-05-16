<?php

declare(strict_types=1);

namespace App\Person\Application\Model;

use App\Common\ValueObject\Uuid;
use Illuminate\Foundation\Http\FormRequest;

final class PersonDetailsRequest extends FormRequest implements PersonDetailsContract
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
        return [];
    }

    public function getId(): Uuid
    {
        return Uuid::fromString($this->personId);
    }

    public function hasId(): bool
    {
        return $this->personId !== null;
    }

    public static function fromArray(array $data): static
    {
        throw new \LogicException('Not implemented');
    }
}
