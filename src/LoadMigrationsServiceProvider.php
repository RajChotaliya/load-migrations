<?php

namespace RajChotaliya\LoadMigrations;

use Illuminate\Support\ServiceProvider;
use RajChotaliya\LoadMigrations\Helpers\MigrationLoader;

class LoadMigrationsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        // Register MigrationLoader
        $this->app->singleton(MigrationLoader::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        // Call MigrationLoader to load migrations
        $migrationLoader = $this->app->make(MigrationLoader::class);
        $migrationLoader->loadCustomMigrations(); // Load migrations on boot
    }
}
