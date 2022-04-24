<?php

namespace OpenEvents\Client\Services\Connections;

use OpenEvents\Client;
use OpenEvents\Event;

/**
 * Connect to the API. This is the default connection.
 */
class APIConnection implements ConnectionContract
{
    public function handle(Event $event)
    {
        (new Client)->dispatchRequest($event);
    }
}
