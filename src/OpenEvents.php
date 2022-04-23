<?php

namespace OpenEvents;

/**
 * The OpenEvents Singleton class.
 */
class OpenEvents
{
    /**
     * @var null|string
     */
    protected ?string $environment;

    /**
     * @return string
     */
    public function environment(): string
    {
        return $this->environment ?? app()->environment();
    }
}
