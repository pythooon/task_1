<?php

declare(strict_types=1);

namespace App\Person\Infrastructure\Event;

use App\Common\Event\EventDeleted;
use App\Common\Event\SystemEvent;
use App\Person\Application\Model\PersonReadContract;

class PersonDeleted extends SystemEvent implements EventDeleted
{
    private const PERSONS = 'persons';
    public function __construct(PersonReadContract $contract)
    {
        parent::__construct($contract);
    }

    /**
     * @return string[]
     */
    public function broadcastOn(): array
    {
        return [static::PERSONS];
    }
}
