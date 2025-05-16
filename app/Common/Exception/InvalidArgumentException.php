<?php

declare(strict_types=1);

namespace App\Common\Exception;

class InvalidArgumentException extends ApiException
{
    private const HTTP_CODE = 422;
    private const ERROR_CODE = 1000;

    /**
     * @param string $message
     * @param array<string, string> $extraParams
     */
    public function __construct(
        string $message,
        array $extraParams = []
    ) {
        parent::__construct($message, self::HTTP_CODE, self::ERROR_CODE, $extraParams);
    }
}
