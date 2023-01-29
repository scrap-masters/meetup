<?php

declare(strict_types=1);

namespace Blumilk\Meetup\Core;

use Blumilk\Meetup\Core\Http\Routing\WebRouting;
use Blumilk\Meetup\Core\Traits\PublishesMigrations;
use Illuminate\Support\ServiceProvider;

class MeetupServiceProvider extends ServiceProvider
{
    use PublishesMigrations;

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . "/../resources/views" => resource_path("views"),
            ], config("meetup.prefix") . "-" . "views");

            $this->publishes([
                dirname(__DIR__) . "/database/seeders" => database_path("seeders"),
            ], config("meetup.prefix") . "-" . "seeders");

            $this->publishes([
                dirname(__DIR__) . "/database/factories" => database_path("factories"),
            ], config("meetup.prefix") . "-" . "factories");

            $this->publishes([
                __DIR__ . "/../resources/static" => public_path("vendor/meetup"),
            ], config("meetup.prefix") . "-" . "assets");

            $this->publishMigrations();
            $this->publishConfigs();
        }
    }

    public function register(): void
    {
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

    protected function publishConfigs(): void
    {
        $this->publishes([__DIR__ . "/../config/" => config_path("")], config("meetup.prefix") . "-" . "config");
    }

    protected function registerRoutes(): void
    {
        $this->app->get(WebRouting::class);
    }
}
