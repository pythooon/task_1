<?php

declare(strict_types=1);

namespace App\Person\Application\Model;

use Illuminate\Foundation\Http\FormRequest;

final class PersonListRequest extends FormRequest implements PersonListContract
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

    public static function fromArray(array $data): static
    {
        throw new \LogicException('Not implemented');
    }
}
