<?php

namespace OpenEvents\LaravelClient;

use JetBrains\PhpStorm\ArrayShape;

class Event
{
    public string $event;
    public ?string $data = null;

    public function __construct(string $event, ?string $data = null)
    {
        $this->event = $event;
        $this->data = $data;
    }

    #[ArrayShape(['event' => "string", 'data' => "null|string"])]
    public function toArray(): array
    {
        return [
            'event' => $this->event,
            'data' => $this->data,
        ];
    }

    /**
     * @deprecated use OpenEvents::dispatch()
     */
    public function dispatchEvent(): void
    {
        (new Client)->dispatchRequest($this);
    }

    public static function dispatch(string $event, ?string $data = null): void
    {
        OpenEvents::dispatch((new static($event, $data)));
    }
}
