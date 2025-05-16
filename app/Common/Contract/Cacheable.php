<?php

declare(strict_types=1);

namespace App\Common\Contract;

interface Cacheable
{
    public function prepareCacheKey(): string;

    public function prepareCacheListKey(): string;
}
