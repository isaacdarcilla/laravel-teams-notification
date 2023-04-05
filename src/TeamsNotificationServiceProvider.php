<?php

namespace TeamsNotification\TeamsNotification;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class TeamsNotificationServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-teams-notification')
            ->hasConfigFile();
    }
}
