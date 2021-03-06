<?php

namespace OpenEvents\LaravelClient\Services\Connections;

use OpenEvents\LaravelClient\Client;
use OpenEvents\LaravelClient\Event;

/**
 * Connect to the API. This is the default connection.
 */
class APIConnection extends Connection
{
    public function handle(Event $event)
    {
        (new Client)->dispatchRequest($event);
    }
}
