<?php

namespace Elegasoft\ProductVersion;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Elegasoft\ProductVersion\Skeleton\SkeletonClass
 */
class ProductVersionFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'product-version';
    }
}
