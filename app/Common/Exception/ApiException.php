<?php

declare(strict_types=1);

namespace App\Common\Exception;

use App\Common\Contract\Arrayable;
use LogicException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ApiException extends HttpException implements Arrayable
{
    private const MESSAGE = "Unexpected API error";
    private const HTTP_CODE = 400;
    private const ERROR_CODE = 66666;
    /**
     * @var array<string, string>
     */
    protected array $extraParams = [];

    /**
     * @param string $message
     * @param int $httpCode
     * @param int $code
     * @param array<string, string> $extraParams
     */
    public function __construct(
        string $message = self::MESSAGE,
        int $httpCode = self::HTTP_CODE,
        int $code = self::ERROR_CODE,
        array $extraParams = []
    ) {
        parent::__construct($httpCode, $message);
        $this->extraParams = $extraParams;
        $this->code = $code;
    }

    /**
     * @return array<string, string|int|array<string,string>>
     */
    public function toArray(): array
    {
        return [
            "code" => $this->getCode(),
            "message" => $this->getMessage(),
            "extraParams" => $this->getExtraParams(),
        ];
    }

    /**
     * @return array<string, string>
     */
    final public function getExtraParams(): array
    {
        return $this->extraParams;
    }
    /**
     * @param array<string, string> $data
     * @return static
     */
    public static function fromArray(array $data): static
    {
        throw new LogicException();
    }
}
