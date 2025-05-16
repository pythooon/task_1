<?php

declare(strict_types=1);

namespace App\Person\Infrastructure\Entity;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id
 * @property string $firstName
 * @property string $lastName
 * @property bool $company
 * @property string|null $companyName
 * @property string|null $vatNumber
 */
class Person extends Model
{
    use HasFactory;

    public const CREATED_AT = 'createdAt';
    public const UPDATED_AT = 'updatedAt';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $table = 'persons';

    /**
     * @var string[]
     */
    protected $casts = ['id' => 'string'];

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'firstName',
        'lastName',
        'company',
        'companyName',
        'vatNumber'
    ];


    public function getId(): string
    {
        return $this->id;
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
        return (bool) $this->company;
    }

    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    public function getVatNumber(): ?string
    {
        return $this->vatNumber;
    }
}
