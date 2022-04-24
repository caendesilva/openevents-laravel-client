<?php

namespace OpenEvents\Client\Services\Connections;

use OpenEvents\Event;

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
