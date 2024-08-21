<?php

namespace Modules\TaskModule\Providers;

use Illuminate\Support\ServiceProvider;

class TaskModuleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Cargar rutas, vistas, migraciones, etc.
        $this->loadRoutesFrom(__DIR__.'/../Routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../Resources/views', 'taskmodule');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
    }
}
