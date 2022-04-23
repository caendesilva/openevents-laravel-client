<?php

namespace OpenEvents\OpenEvents;

use Illuminate\Support\Facades\Facade;

/**
 * @see \OpenEvents\OpenEvents\Skeleton\SkeletonClass
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
