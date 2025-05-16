<?php

declare(strict_types=1);

namespace App\Person\Infrastructure\Event;

use App\Common\Event\EventCreated;
use App\Common\Event\SystemEvent;
use App\Person\Application\Model\PersonReadContract;

class PersonCreated extends SystemEvent implements EventCreated
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
