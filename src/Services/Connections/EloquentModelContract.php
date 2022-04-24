<?php

namespace OpenEvents\Client\Services\Connections;

use OpenEvents\Event;

interface EloquentModelContract
{
    public function toEvent(): Event;
}
