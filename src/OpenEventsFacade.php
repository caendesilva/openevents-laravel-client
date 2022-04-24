<?php

namespace OpenEvents\LaravelClient;

use Illuminate\Support\Facades\Facade;

/**
 * @see \OpenEvents\Skeleton\SkeletonClass
 */
class OpenEventsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'openevents';
    }
}
