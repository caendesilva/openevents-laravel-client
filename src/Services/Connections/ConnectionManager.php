<?php

namespace OpenEvents\LaravelClient\Services\Connections;

use OpenEvents\LaravelClient\Services\Connections\Connection;
use OpenEvents\LaravelClient\Event;

/**
 * Loaded through the OpenEvents Singleton and keeps track of the connection to use.
 */
class ConnectionManager
{
    /**
     * The OpenEvents Connection to use.
     */
    protected Connection $connection;

    /**
     * Set or switch the class connection.
     */
    public function connectTo(Connection $connection): self
    {
        $this->connection = $connection;

        return $this;
    }

    /**
     * Dispatch an event to the configured connection.
     */
    public function dispatch(Event $event): void
    {
        $this->connection->handle($event);
    }

    /**
     * Create a new connection manager instance with the supplied connection.
     */
    public static function connect(string $connectionClass): ConnectionManager
    {
        return (new static)->connectTo(new $connectionClass);
    }
}
