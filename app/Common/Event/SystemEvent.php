<?php

declare(strict_types=1);

namespace App\Common\Event;

use App\Common\Contract\ReadContract;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\SerializesModels;

abstract class SystemEvent
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    public function __construct(protected readonly ReadContract $contract)
    {
    }


    public function broadcastAs(): string
    {
        return static::class;
    }

    /**
     * @return array<int|string, mixed>
     */
    public function broadcastWith(): array
    {
        return $this->contract->toArray();
    }

    /**
     * @return array<int, string>
     */
    abstract public function broadcastOn(): array;
}
