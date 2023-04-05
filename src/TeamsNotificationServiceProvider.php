<?php

namespace TeamsNotification\TeamsNotification;

use Illuminate\Support\Facades\Event;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use TeamsNotification\TeamsNotification\Events\OrderStatusEvent;
use TeamsNotification\TeamsNotification\Listeners\OrderNotificationListener;

class TeamsNotificationServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-teams-notification')
            ->hasConfigFile();
    }

    public function bootingPackage()
    {
        Event::listen(OrderStatusEvent::class, OrderNotificationListener::class);
    }
}
