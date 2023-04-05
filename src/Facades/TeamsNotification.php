<?php

namespace TeamsNotification\TeamsNotification\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \TeamsNotification\TeamsNotification\TeamsNotification
 */
class TeamsNotification extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \TeamsNotification\TeamsNotification\TeamsNotification::class;
    }
}
