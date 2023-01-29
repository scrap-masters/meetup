<?php

declare(strict_types=1);

namespace Blumilk\Meetup\Core;

use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class MeetupServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name("meetup")
            ->hasConfigFile("*")
            ->hasViews()
            ->hasAssets()
            ->publishesServiceProvider("MeetupServiceProvider")
            ->hasRoute("web")
            ->hasMigration("*")
            ->hasInstallCommand(function (InstallCommand $command): void {
                $command
                    ->publishConfigFile()
                    ->publishMigrations()
                    ->copyAndRegisterServiceProviderInApp();
            });
    }
}
