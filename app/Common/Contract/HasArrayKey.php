<?php

declare(strict_types=1);

namespace App\Common\Contract;

use App\Common\Exception\InvalidArgumentException;
use ReflectionException;
use ReflectionProperty;

trait HasArrayKey
{
    /**
     * @param array<string, mixed> $data
     * @return void
     */
    protected static function validate(array $data): void
    {
        $classVars = get_class_vars(static::class);
        foreach ($classVars as $name => $value) {
            try {
                $reflectionProperty = new ReflectionProperty(static::class, $name);
                $reflectionType = $reflectionProperty->getType();
                if ($reflectionType !== null && $reflectionType->allowsNull()) {
                    continue;
                }
            } catch (ReflectionException $exception) {
                throw new InvalidArgumentException("Property {$name} error: " . $exception->getMessage());
            }
            if (!array_key_exists($name, $data)) {
                throw new InvalidArgumentException(static::class . " array key $name not set");
            }
        }
    }
}
