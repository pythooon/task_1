<?php

declare(strict_types=1);

namespace App\Person\Application\Exception;

use App\Common\Exception\ApiException;

class PersonNotFoundException extends ApiException
{
    private const CODE = 10000;
    public const MESSAGE = "Person not found";

    public function __construct()
    {
        parent::__construct(self::MESSAGE, 404, self::CODE);
    }
}
