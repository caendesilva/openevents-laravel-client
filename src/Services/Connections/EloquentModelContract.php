<?php

namespace OpenEvents\LaravelClient\Services\Connections;

use OpenEvents\LaravelClient\Event;

interface EloquentModelContract
{
    public function toEvent(): Event;
}
