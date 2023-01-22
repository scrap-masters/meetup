<?php

declare(strict_types=1);

namespace Blumilk\Meetup\Core;

use Blumilk\Meetup\Core\Http\Routing\WebRouting;
use Illuminate\Support\ServiceProvider;

class MeetupServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . "/../resources/views" => resource_path("views"),
            ], "views");

            $this->publishes([
                dirname(__DIR__) . "/database/seeders" => database_path("seeders"),
            ], "seeders");

            $this->publishes([
                dirname(__DIR__) . "/database/migrations" => database_path("migrations"),
            ], "migrations");

            $this->publishes([
                __DIR__ . "/../resources/static" => public_path("vendor/meetup"),
            ], "assets");
        }
    }

    public function register(): void
    {
        $this->registerConfigs();
        $this->registerRoutes();
    }

    protected function registerConfigs(): void
    {
        $configs = array_slice(scandir(__DIR__ . "/../config"), 2);

        foreach ($configs as $config) {
            $this->mergeConfigFrom(
                __DIR__ . "/../config/" . $config,
                basename($config, ".php"),
            );
        }
    }

    protected function registerRoutes(): void
    {
        $this->app->get(WebRouting::class);
    }
}
