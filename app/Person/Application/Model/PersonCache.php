<?php

declare(strict_types=1);

namespace App\Person\Application\Model;

use App\Common\Contract\Cacheable;
use App\Common\Contract\HasId;

class PersonCache implements Cacheable
{
    private const KEY = 'person';

    public function prepareCacheKey(?HasId $hasId = null): string
    {
        $key = $this->prepareCacheListKey();

        if ($hasId) {
            $key .= "/{$hasId->getId()->getUuid()}";
        }

        return $key;
    }

    public function prepareCacheListKey(): string
    {
        return static::KEY;
    }
}
