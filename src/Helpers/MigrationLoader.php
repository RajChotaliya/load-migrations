<?php

namespace RajChotaliya\LoadMigrations\Helpers;

use Illuminate\Support\Facades\File;

class MigrationLoader
{
    /**
     * Load migrations from a directory and its subdirectories.
     *
     * @param string|null $directory
     */
    public function loadCustomMigrations($directory = null)
    {
        // Use default migrations path if not provided
        $directory = $directory ?? database_path('migrations');

        // Load migrations from the directory
        $this->loadMigrationsFromDirectory($directory);

        // Get subdirectories and recursively load migrations
        $subdirectories = File::directories($directory);
        foreach ($subdirectories as $subdirectory) {
            $this->loadCustomMigrations($subdirectory); // Recursive call
        }
    }

    /**
     * Load migrations from a given directory.
     *
     * @param string $directory
     */
    protected function loadMigrationsFromDirectory($directory)
    {
        if (File::exists($directory)) {
            // Load the migrations using the migrator
            app('migrator')->path($directory);
        }
    }
}
