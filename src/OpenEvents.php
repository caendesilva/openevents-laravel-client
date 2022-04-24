<?php

namespace OpenEvents\LaravelClient;

use OpenEvents\LaravelClient\Services\Connections\APIConnection;
use OpenEvents\LaravelClient\Services\Connections\ConnectionManager;

/**
 * The OpenEvents Singleton class.
 * Access it through the facade.
 */
class OpenEvents
{
    /**
     * The environment the application is running in.
     * Defaults to the Laravel app environment.
     * @var null|string
     */
    protected ?string $environment;

    /**
     * The OpenEvents Connection Manager.
     * Access the connection through it.
     * @var ConnectionManager
     */
    protected ConnectionManager $connectionManager;

    /**
     * Construct the OpenEvents Singleton Instance.
     */
    public function __construct()
    {
        $this->environment = config('app.env', 'production');
        $this->connectionManager = ConnectionManager::connect(
            config('openevents.connection', APIConnection::class)
        );
    }

    /**
     * Get the current environment.
     * @return string
     */
    public function environment(): string
    {
        return $this->environment ?? app()->environment();
    }

    /**
     * Dispatch an Event through the configured connection.
     * @param Event $event
     */
    public function dispatch(Event $event): void
    {
        $this->connectionManager->dispatch($event);
    }
}
