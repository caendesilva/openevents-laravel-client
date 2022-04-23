<?php

namespace OpenEvents\LaravelClient;

use Illuminate\Support\Facades\Facade;

/**
 * @see \OpenEvents\LaravelClient\Skeleton\SkeletonClass
 */
class LaravelClientFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravelclient';
    }
}
