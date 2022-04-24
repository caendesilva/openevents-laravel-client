<?php

namespace OpenEvents\LaravelClient\Tests;

use OpenEvents\LaravelClient\Event;
use OpenEvents\LaravelClient\Services\Connections\Connection;

/**
 * File Connection driver for mocking dispatching during testing.
 */
class TestConnection extends Connection
{
    public function handle(Event $event)
    {
        file_put_contents('event.json', json_encode($event));
    }
}
