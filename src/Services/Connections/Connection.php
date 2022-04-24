<?php

namespace OpenEvents\LaravelClient\Services\Connections;

use OpenEvents\LaravelClient\Event;

abstract class Connection implements ConnectionContract
{
    abstract public function handle(Event $event);
}
