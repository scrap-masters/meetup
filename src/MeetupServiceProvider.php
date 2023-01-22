<?php

declare(strict_types=1);

namespace Blumilk\Meetup\Core;

use Illuminate\Support\ServiceProvider;

class MeetupServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(dirname(__DIR__) . "/database/migrations");
        $this->loadViewsFrom(dirname(__DIR__) . "/resources/views", "cms");

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . "/../resources/views" => resource_path("views/vendor/meetup"),
            ], "views");

            $this->publishes([
                dirname(__DIR__) . "/database/migrations" => database_path("migrations"),
            ], "migrations");

            $this->publishes([
                __DIR__ . "/../resources/static" => public_path("meetup"),
            ], "assets");
        }
    }

    public function register(): void
    {
        $this->registerConfigs();
    }

    protected function registerConfigs(): void
    {
        $configs = scandir(__DIR__ . "/../config");

        foreach ($configs as $config) {
            $this->mergeConfigFrom(
                __DIR__ . "/../config/" . $config,
                basename($config, ".php"),
            );
        }
    }
}
