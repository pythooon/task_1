<?php

declare(strict_types=1);

namespace App\Common\Event;

use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

interface Event extends ShouldBroadcast
{
        /**
     * @return array<int, string>
     */
    public function broadcastOn(): array;

    public function broadcastAs(): string;

    /**
     * @return array<int|string, mixed>
     */
    public function broadcastWith(): array;
}
