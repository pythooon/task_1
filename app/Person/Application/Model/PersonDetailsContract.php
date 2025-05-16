<?php

declare(strict_types=1);

namespace App\Person\Application\Model;

use App\Common\Contract\Arrayable;
use App\Common\Contract\HasId;

interface PersonDetailsContract extends HasId, Arrayable
{
}
