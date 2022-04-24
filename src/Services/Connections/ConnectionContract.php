<?php

namespace OpenEvents\LaravelClient\Services\Connections;

use OpenEvents\LaravelClient\Event;

/**
 * A connection takes an Event and stores it somewhere.
 */
interface ConnectionContract
{
    /**
     * Store an event.
     * @param Event $event
     */
    public function handle(Event $event);
}
